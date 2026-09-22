<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;

class BookController extends Controller{

    public function showbooks() {
        $books= Book::with('user')->get();
        return view('user.book.show',compact('books'));
    }

}

?>