<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    // go post page
    public function showPost(){
        return view('admin.post.index');
    }
}
