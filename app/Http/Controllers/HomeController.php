<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->is('admin')) {
            return view('admin.home');
        }

        return view('user.userhome');
    }
}

