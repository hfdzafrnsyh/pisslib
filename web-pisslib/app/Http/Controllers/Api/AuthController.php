<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class AuthController extends Controller
{
    //

    public function register(Request $request){
        
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed'
            
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'isAdmin' => 0,
            'image' => 'default.png'
        ]);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user' => $user , 'access_token' => $accessToken ]);

    }



    public function login(Request $request) {

        $dataLogin = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        if(!auth()->attempt($dataLogin)){
            return response(['message' => 'Invalid email or password' ]);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user() , 'accessToken' => $accessToken]);

    }


    public function logout(Request $request)
         {
            $request->user()->token()->revoke();
            return response()->json([
                'message' => 'Logout Successfully'
            ]);
       }

}

