<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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

    // delete posts
    public function deletePost($id){


        $postData = Post::where('id',$id)->first();

        if(File::exists(public_path().'/postImage/'.$postData->image)){
            File::delete(public_path().'/postImage/'.$postData->image);
        }

        // delete from db
        Post::where('id',$id)->delete();

        return back()->with(['deleteSuccess'=>'Post deleted successfully!']);
    }

    // redirect to post edit page
    public function postUpdatePage($id){
        $data = Post::where('id',$id)->first();
        $category = Category::get();
        return view('admin.post.updatePost',compact('data','category'));
    }

    // update post data
    public function postUpdateData($id,Request $req){

        // checking validation
        $validator = $this->postValidationCheck($req);

        if($validator->fails()){
            return back()->withErrors($validator)
                        ->withInput();
        }

        if(isset($req->postImage)){
            $this->updateDataWithImage($id,$req);
        }
        else{
            $this->updateWithoutImage($id,$req);
        }

        return redirect()->route('admin#post')->with(['updateSuccess'=>'Post data updated successfully!']);

    }

    // update post without image
    private function updateWithoutImage($id,$req){
        $data = [
            'title' => $req->postTitle,
            'category_id' => $req->postCategory,
            'description' => $req->postDescription,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        Post::where('id',$id)->update($data);
    }

    // update post data with image
    private function updateDataWithImage($id,$req){
        $file = $req->file('postImage');
        $fileName = uniqid().'_'.$file->getClientOriginalName();

        $postData = Post::where('id',$id)->first();

        if($postData->image != null){
            if(File::exists(public_path().'/postImage/'.$postData->image)){
                File::delete(public_path().'/postImage/'.$postData->image);
            }
        }

        $file->move(public_path().'/postImage',$fileName);
        $data = $this->getPostData($req,$fileName);
        Post::where('id',$id)->update($data);
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
