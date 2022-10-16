<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // user login and gives back a token
    public function login(Request $req){

        $userData = User::where('email',$req->email)->first();

        if(isset($userData)){
            if(Hash::check($req->password, $userData->password)){
                return response()->json([
                    'user'=> $userData,
                    'token'=> $userData->createToken(time())->plainTextToken
                ]);
            }
            else{
                return response()->json([
                    'user'=> null,
                    'token'=> null
                ]);
            }
        }
        else{
            return response()->json([
                'user'=> null,
                'token'=> null
            ]);
        }

    }

    public function register(Request $req){
        $data = [
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password)
        ];

        User::create($data);
        $userData = User::where('email',$req->email)->first();
        return response()->json([
            'user'=> $userData,
            'token'=> $userData->createToken(time())->plainTextToken
        ]);

    }
}
