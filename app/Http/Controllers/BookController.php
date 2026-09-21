<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;

class BookController 
{
    public function showbooks(){
        $books=Book::with('user')->get();    
        return view('user.book.show',compact('books'));
    }

    public function addbook()
    {
        return view('user.addbook');
    }

    public function storebook(BookRequest $request){
        // $phname=$request->file('image')->getClientOriginalName();
        $phextension=$request->file('photo')->getClientOriginalExtension();
        $email=$request->email;
        $request->file('image')->storeAs('images',$email.".".  $phextension);
        $bookdata= $request->validated();
        Book::create($bookdata);
        return redirect()->back()->with('message','book added');

        }

    public function editbook($id)
    {
        $book = Book::findorfail($id);
        return view('user.book.edit',compact('book'));
    
    }

    public function deletebook($id)
    {
        $book= Book::findorfail($id);
        $book-> delete();
        return redirect()->back()->with('message','book deleted successfully');
    
    }

    public function accept($id){
        $book= Book::findorfail($id);
        $book->update(['status' => 'غير متاح']); 
        return redirect()->back();
    }
    
}
