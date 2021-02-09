<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' =>  ['auth' , 'Role:1']] , function(){
    
    // data user
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/datauser' , 'Datauser\DatauserWebController@index');
    Route::get('/datauser/{id}/detail' , 'Datauser\DatauserWebController@show');
    Route::get('/datauser/{id}/edit' , 'Datauser\DatauserWebController@edit');
    Route::patch('/datauser/{id}' , 'Datauser\DatauserWebController@update');
    Route::delete('/datauser/{id}' , 'Datauser\DatauserWebController@destroy');
   
    // books
    Route::get('/books' , 'Book\BookWebController@index');
    Route::post('/books/create' , 'Book\BookWebController@create');
    Route::get('/books/{id}/detail' , 'Book\BookWebController@show');
    Route::get('/books/{id}/edit' , 'Book\BookWebController@edit');
    Route::patch('/books/{id}' , 'Book\BookWebController@update');
    Route::delete('/books/{id}' , 'Book\BookWebController@destroy');

    // user profile
    Route::get('/userprofile/{id}' , 'User\ProfileWebController@index');
    Route::get('/userprofile/{id}/changepassword' , 'User\ProfileWebController@changePassword');
    Route::patch('/userprofile/{id}' , 'User\ProfileWebController@updatePassword');
});
