<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Http\Requests\BookRequest;

class BookController extends Controller{    

    public function index()
    {
        $books = Book::with('user')->get();
        $users=User::get();
        $usersCount = User::count();
        $booksCount = Book::count();

        $availableBooks = Book::where('state', 'متاح')->count();

        $unavailableBooks = Book::where('state', 'غير متاح')->count();

        return view('admin.users.admin_dasboard.app', compact('books','users',
            'usersCount',
            'booksCount',
            'availableBooks',
            'unavailableBooks'
        ));
    }

    public function destroy($id){
        $book=Book::findorfail($id);
        $book->delete();
        return redirect()->back()->with('msg','deleted successfully');
    }

    // public function edit($id){
    //     $book=Book::findorfail($id);
    //     return view('admin.users.admin_dasboard.Bedit',compact('book'));
    // }

    // public function update(BookRequest $request , $id){
    //     $data=$request->validated();
    //     $book=Book::findorfail($id);
    //     $book->update($data);
    //     return redirect()->back()->with('message','updated successfully');
    // }

}