<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;

class BookController extends Controller
{
    public function showbooks($id){
        $book=Book::findorfail($id);
        return view('user.book.show',compact('book'));
    }

    public function addbook()
    {
        return view('user.addbook');
    }

    public function storebook(BookRequest $request){
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
        return redirect()->back()->with('message','student deleted successfly');
    
    }

    public function buy()
    {
        return view('user.book.');
    }
    
}
