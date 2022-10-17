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
}
