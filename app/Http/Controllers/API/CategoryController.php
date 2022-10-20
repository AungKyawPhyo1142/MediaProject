<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    // get all categories
    public function getAllCategories(){
        $category = Category::select('id','title','description')->get();
        return response()->json([
            'category'=>$category
        ], 200);
    }

    // search with category
    public function searchWithCategory(Request $req){

        $category = Category::  select('posts.*')
                                ->join('posts','categories.id','posts.category_id')
                                ->where('categories.title','LIKE','%'.$req->key.'%')->get();

        return response()->json([
            'result' => $category
        ], 200);
    }

}
