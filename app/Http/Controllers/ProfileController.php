<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // go to admin dashboard
    public function goDashboard(){
        $currentID = Auth::user()->id;
        $currentProfileData = User::select('id','name','phone','address','gender','email')
                                ->where('id',$currentID)->first();
        return view('admin.profile.index',compact('currentProfileData'));
    }
}
