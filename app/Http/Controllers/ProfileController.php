<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    // go to admin dashboard
    public function goDashboard(){
        $currentID = Auth::user()->id;
        $currentProfileData = User::select('id','name','phone','address','gender','email')
                                ->where('id',$currentID)->first();
        return view('admin.profile.index',compact('currentProfileData'));
    }

    // update admin data
    public function updateData(Request $req){
        $userData = $this->getUserData($req);
        $validation = $this->dataValidation($req);

        if($validation->fails()){
            return back()->withErrors($validation)
                        ->withInput();
        }

        User::where('id',Auth::user()->id)->update($userData);
        return back()->with(['updateSuccess'=>'Admin profile data updated successfully!']);
    }

    // get user data
    private function getUserData($req){
        return [
            'name'=>$req->name,
            'email'=>$req->email,
            'phone'=>$req->phone,
            'address'=>$req->address,
            'gender'=>$req->gender,
            'updated_at'=>Carbon::now()
        ];
    }

    // admin data validations
    private function dataValidation($req){
        $validator = Validator::make($req->all(),[
            'name' => 'required',
            'email' => 'required',
        ],[
            'name.required' => 'Admin name field is required',
            'email.required' => 'Admin email field is required'
        ]);
        return $validator;
    }
}
