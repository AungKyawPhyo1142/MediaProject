<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListController extends Controller
{
    // go to admin list page
    public function goAdminList(){
        return view('admin.list.index');
    }
}
