<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\report;
use App\Models\review;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    public function home()
    {
        $usersCount       = User::count();
        $booksCount       = Book::count();
        $availableBooks   = Book::where('state', 'متاح')->count();
        $unavailableBooks = Book::where('state', 'غير متاح')->count();
        $reportsCount     = report::count();
        $reviewsCount     = review::count();
        $recentReports    = report::with('user')->latest()->take(5)->get();
        $recentBooks      = Book::with('user')->latest()->take(5)->get();

        return view('admin.home', compact(
            'usersCount', 'booksCount', 'availableBooks',
            'unavailableBooks', 'reportsCount', 'reviewsCount',
            'recentReports', 'recentBooks'
        ));
    }

    public function index()
    {
        $books            = Book::with('user')->get();
        $users            = User::get();
        $usersCount       = User::count();
        $booksCount       = Book::count();
        $availableBooks   = Book::where('state', 'متاح')->count();
        $unavailableBooks = Book::where('state', 'غير متاح')->count();

        return view('admin.users.admin_dasboard.app', compact(
            'books', 'users', 'usersCount', 'booksCount',
            'availableBooks', 'unavailableBooks'
        ));
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->back()->with('msg', 'deleted successfully');
    }
}
