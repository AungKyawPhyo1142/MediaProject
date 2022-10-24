<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\ActionLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrendPostController extends Controller
{
    // go to trend post page
    public function showTrendPost(){
        $posts = ActionLog:: select('action_logs.*','posts.*',DB::raw('COUNT(action_logs.post_id) as post_count'))
                            ->leftJoin('posts','posts.id','action_logs.post_id')
                            ->groupBy('action_logs.post_id')
                            ->get();
        return view('admin.trend_post.index',compact('posts'));
    }

    // show detail
    public function showDetails($id,$count){
        $data = Post::where('id',$id)->first();
        $category = Category::where('id',$data->category_id)->first();
        return view('admin.trend_post.details',compact('data','category','count'));
    }
}
