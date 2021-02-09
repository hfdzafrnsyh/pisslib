<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;

class BookWebController extends Controller
{
    //

    public function index(){

        $book = Book::paginate(5);
        return view('books.index' , compact('book'));

    }



    public function create(Request $request){

        $request->validate([
            'namebook' => 'required',
            'authorbook' => 'required',
            'price' => 'required',
            'launching' => 'required',
            'description' => 'required'
        ]);
        
        $book=Book::create($request->all());

        if($request->hasFile('image')){
            $request->file('image')->move('wp-pisslib/image/books/' , $request->file('image')->getClientOriginalName());
            $book->image=$request->file('image')->getClientOriginalName();
            $book->save();
        }

        return redirect('/books')->with('success' , 'Data Book berhasil ditambah');
    }

    public function show($id){
        $book = Book::find($id);
        return view('books.detail' , compact('book'));
    }



    public function edit($id){
        $book = Book::find($id);
        return view('books.edit' , compact('book'));
    }

    public function update(Request $request , $id){

        $request->validate([
            'namebook' => 'required',
            'authorbook' => 'required',
            'price' => 'required',
            'launching' => 'required',
            'description' => 'required'

        ]);

        $book = Book::find($id);
        $book->update($request->all());

        if($request->hasFile('image')){
            $request->file('image')->move('wp-pisslib/image/books/' , $request->file('image')->getClientOriginalName());
            $book->image=$request->file('image')->getClientOriginalName();
            $book->save();
        }

        return redirect('/books')->with('success' ,'Update Books Success');

    }


    public function destroy($id){
        Book::destroy($id);
        return redirect('/books')->with('success' , 'Data berhasil dihapus');
    }

}
