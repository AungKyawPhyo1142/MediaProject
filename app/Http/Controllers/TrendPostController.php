<?php

namespace App\Http\Controllers;

use App\Models\ActionLog;
use Illuminate\Http\Request;

class TrendPostController extends Controller
{
    // go to trend post page
    public function showTrendPost(){
        $posts = ActionLog:: select('action_logs.*','posts.*')
                            ->leftJoin('posts','posts.id','action_logs.post_id')
                            ->paginate(5);

        return view('admin.trend_post.index',compact('posts'));
    }
}
