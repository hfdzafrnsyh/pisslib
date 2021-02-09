<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;

class BookApiController extends Controller
{
    //

    public function index(){
        $book = Book::all();
        return response()->json(['data' => $book] , 200);
    }
    
}
