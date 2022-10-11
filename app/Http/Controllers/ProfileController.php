<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // go to admin dashboard
    public function goDashboard(){
        return view('admin.profile.index');
    }
}
