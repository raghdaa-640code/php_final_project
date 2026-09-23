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
        return view('user.book.showmybooks', compact('mybooks'));
    }

    public function addbook()
    {
        return view('user.book.addbook');
    }

    public function storebook(BookRequest $request){
        // $phextension=$request->file('image')->getClientOriginalExtension();
        // $email=User::where('email',$request->email)->value('email');
        $user=Auth::user();
        // $name=$user->name;
        $bookdata= $request->validated();
        if ($request->hasFile('image')) {
        $imagepath = $request->file('image')->store('images', 'public');
        $bookdata['image'] = $imagepath;
        } 
        // $request->file('image')->storeAs('images',$name . $bookdata->id .".". $phextension,'public');  
        // $bookdata['image']='images/'.$name.$bookdata->id .".".  $phextension; 
        $bookdata['user_id']=$user->id;         // to add user id with book data
        Book::create($bookdata);
            return redirect()->route('user.showmybooks',$user->id)->with('message','book added');

        }

    public function editbook($id)
    {
        $book = Book::findorFail($id);
        return view('user.book.edit',compact('book'));
    
    }

        public function updatebook($id, BookRequest $request){
        $book = Book::findorFail($id);
        $data= $request -> validated();
        $userid=Auth::user()->id;
        if ($request->hasFile('image')){
        $imagepath = $request->file('image')->store('images', 'public');    
            $data['image']=$imagepath;
            }else{
                $data['image']=$book->image;
            }

        $book->update($data);
        return redirect()->route('user.showmybooks',$userid)->with('message','data updated successfly');
        
    }

    public function deletebook($id)
    {
        $book= Book::findorFail($id);
        $book-> delete();
        return redirect()->back()->with('message','book deleted successfully');
    
    }

    public function accept($id){
        $book= Book::findorFail($id);
        $book->update(['state' => 'غير متاح']); 
        return redirect()->back();
    }
    public function request($id)
    {
    // $book = Book::findOrFail($id);
    return redirect()->back()->with('message', 'تم طلب الكتاب بنجاح');
    }
    
}
// <?php 

// namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
// use App\Models\Book;

// class BookController extends Controller{

//     public function showbooks() {
//         $books= Book::with('user')->get();
//         return view('user.book.show',compact('books'));
//     }

// }

// ?>
