<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
// use App\Models\User;

class BookController 
{
    public function showbooks(){
        $userid=Auth::user()->id;
        $otherbooks=Book::where('user_id', '!=', $userid)->get();   
        return view('user.book.show',compact('otherbooks'));
    }

    public function showmybooks(){
        $userid=Auth::user()->id;
        $mybooks=Book::where('user_id', $userid)->get();   
        return view('user.shownybooks',compact('mybooks'));
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
        $name=$user->name;
        $request->file('image')->storeAs('images',$name . $user->id .".". $phextension,'public');  
        $bookdata= $request->validated(); 
        $bookdata['image']='images/'.$name.$user->id .".".  $phextension; 
        $bookdata['user_id']=$user->id;         // to add user id with book data
        Book::create($bookdata);
        return redirect()->route('user.showmybooks')->with('message','book added');

        }

    public function editbook($id)
    {
        $book = Book::findorFail($id);
        return view('user.book.edit',compact('book'));
    
    }

        public function updatebook($id, BookRequest $request){
        $book = Book::findorFail($id);
        $data= $request -> validated();
        if ($request->hasFile('image')){
            $phextension=$request->file('image')->getClientOriginalExtension();
            $user=Auth::user();
            $username=Auth::user()->name;
            $request->file('image')->storeAs('images', $username . $user->id . ".". $phextension,'public');
            $data['image']='images/'. $username.$user->id .".".  $phextension;
            }else{
                $data['image']=$book->image;
            }

        $book->update($data);
        return redirect()->route('user.showbooks')->with('message','data updated successfly');
        
    }

    public function deletebook($id)
    {
        $book= Book::findorFail($id);
        $book-> delete();
        return redirect()->back()->with('message','book deleted successfully');
    
    }

    public function accept($id){
        $book= Book::findorFail($id);
        $book->update(['status' => 'غير متاح']); 
        return redirect()->back();
    }
    
}
