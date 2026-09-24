<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Book;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index()
    {
        $books = Book::with('user')->get();
        $users=User::get();
        $userscount = User::count();
        $bookscount = Book::count();

        $availableBooks = Book::where('state', 'متاح')->count();

        $unavailableBooks = Book::where('state', 'غير متاح')->count();

        return view('admin.users.admin_dasboard.app',[
            'books'=>$books,
            'users'=>$users,
            'userscount'=>$userscount,
            'bookscount'=>$bookscount,
            'availableBooks'=>$availableBooks,
            'unavailableBooks'=>$unavailableBooks,
        ]);
    }

    public function create()
    {
        return view('admin.users.admin_dasboard.create');
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();

        User::create($data);

        return redirect()->back()->with('message', 'user added successfully');
    }

    public function edit(int $id)
    {
        $book = Book::get();
        $user = User::findOrFail($id);

        return view('admin.users.admin_dasboard.edit', compact('book', 'user'));
    }

    public function destroy(int $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('message', 'deleted successfully');
    }

    public function update(UserRequest $request, int $id)
    {
        $data = $request->validated();

        $user = User::findOrFail($id);
        $user->update($data);

        return redirect()->back()->with('message', 'updated successfully');
    }
}
