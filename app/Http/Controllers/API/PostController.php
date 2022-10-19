<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    // return all the posts
    public function getAllPosts(){
        $posts = Post::get();
        return response()->json([
            'post' => $posts
        ], 200);
    }

    //search post
        public function searchPost(Request $req){
            $post = Post::where('title','like','%'.$req->key.'%')->get();
            return response()->json([
                'searchData' => $post
            ], 200);
        }

}
