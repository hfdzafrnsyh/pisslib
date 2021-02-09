<?php

namespace App\Http\Controllers\Datauser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class DatauserWebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::all();
        return view('datauser.index' , ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);
        return view('datauser.detail' , compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        return view('datauser.edit' , compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  
        $request->validate([
            'name' => 'required',
            'isAdmin' => 'required'
        ]);

       $user=User::find($id);
       $user->update($request->all());
       
       if($request->hasFile('image')){
        $request->file('image')->move('wp-pisslib/image/userprofile/' , $request->file('image')->getClientOriginalName());
        $user->image=$request->file('image')->getClientOriginalName();
        $user->save();
       };
       return redirect('/datauser')->with('success' ,'Update Profile Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        User::destroy($id);
        return redirect('/datauser')->with('success' , 'Data berhasil dihapus');
    }
}
