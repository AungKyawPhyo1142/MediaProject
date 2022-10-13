<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    // go post page
    public function showPost(){
        $category = Category::get();
        $post = Post::get();
        return view('admin.post.index',compact('category','post'));
    }

    // create post
    public function createPost(Request $req){

        // checking validation
        $validator = $this->postValidationCheck($req);

        if($validator->fails()){
            return back()->withErrors($validator)
                        ->withInput();
        }

        // getting post image
        $file = $req->file('postImage');

        if($file!=null){
            $fileName = uniqid().'_'.$file->getClientOriginalName();
            // store inside public->public_path, storage->storage_path()
            $file->move(public_path().'/postImage',$fileName);
        }
        else{
            $fileName = null;
        }

        // getting postData
        $data = $this->getPostData($req,$fileName);


        Post::create($data);
        return back()->with(['insertSuccess'=>'Post inserted successfully!']);

    }

    // check post validation
    private function postValidationCheck($req){
        $validator = Validator::make($req->all(),[
            'postTitle' => 'required',
            'postDescription' => 'required',
            'postCategory' => 'required',
            'postImage' => 'mimes:jpg,jpeg,webp,gif,png'
        ]);
        return $validator;
    }

    // get post data
    private function getPostData($req,$fileName){
        return [
            'title' => $req->postTitle,
            'image' => $fileName,
            'category_id' => $req->postCategory,
            'description' => $req->postDescription,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }

}
