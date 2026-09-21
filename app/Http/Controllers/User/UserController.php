<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function userhome(){
        $user= User::get();
        return view('user.userhome',compact('user'));
    }
    public function profile($id)
    {    $id= User::findorfail($id);
        return view('user.profile');
    }

}
