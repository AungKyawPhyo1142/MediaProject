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

}
