<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrendPostController extends Controller
{
    // go to trend post page
    public function showTrendPost(){
        return view('admin.trend_post.index');
    }
}
