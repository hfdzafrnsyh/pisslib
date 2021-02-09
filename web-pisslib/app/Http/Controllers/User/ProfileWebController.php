<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use Validator;

class ProfileWebController extends Controller
{
    
    public function index($id){
        $user = User::find($id);
        return view('userprofile.index' , compact('user'));
    }


    public function changePassword(){
        return view('userprofile.password');
    }


    public function updatePassword(Request $request){

        $validator = Validator::make(request()->all() , [
            'old_password' => 'required|password',
            'new_password' => 'min:6|required_with:repeat_password|same:repeat_password',
            'repeat_password' => 'min:6'
        ]);

        if($validator->fails()){
            return redirect()
            ->back()
            ->withErrors($validator->errors());
        }

        $user = User::find(Auth::id());

        $user->password = bcrypt(request('new_password'));
        $user->save();

        return redirect('/home')->with('success' , 'Edit Password Success');
    }
}
