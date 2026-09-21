<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
// use App\Models\User;

class BookController 
{
    public function showbooks(){
        $books=Book::with('user')->get();    
        return view('user.book.show',compact('books'));
    }

    public function addbook()
    {
        return view('user.book.addbook');
    }

    public function storebook(BookRequest $request){
        // $phname=$request->file('image')->getClientOriginalName();
        $phextension=$request->file('image')->getClientOriginalExtension();
        // $email=User::where('email',$request->email)->value('email');
        $user=Auth::user();
        // $email=$user->email;
        $email='sara@gmail.com';   //
        $request->file('image')->storeAs('images',$email.".".  $phextension);  
        // $userid=$user->id;
        $userid=1;    //
        $bookdata= $request->validated();  
        $bookdata['user_id']=$userid;         // to add user id with book data
        Book::create($bookdata);
        return redirect()->route('user.showbooks')->with('message','book added');

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
