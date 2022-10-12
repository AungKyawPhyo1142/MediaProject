<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ListController extends Controller
{
    // go to admin list page
    public function goAdminList(){
        $userData = User::  select('id','name','email','gender','phone','address')
                            ->get();
        return view('admin.list.index',compact('userData'));
    }

    // delete account data
    public function deleteData($id){
        User::where('id',$id)->delete();
        return back()->with(['deleteSuccess'=>'Account deleted successfully!']);
    }

    // search data
    public function searchData(Request $req){
        $userData = User::    orWhere('name','like','%'.$req->searchKey.'%')
                            ->orWhere('email','like','%'.$req->searchKey.'%')
                            ->orWhere('phone','like','%'.$req->searchKey.'%')
                            ->orWhere('address','like','%'.$req->searchKey.'%')
                            ->orWhere('gender','like',$req->searchKey.'%')
                            ->get();
        return view('admin.list.index',compact('userData'));
    }

}
