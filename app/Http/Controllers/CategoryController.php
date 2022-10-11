<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // go category page
    public function showCategory(){
        return view('admin.category.index');
    }
}
