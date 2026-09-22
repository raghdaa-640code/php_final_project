<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{

    public function create(){
        return view('admin.users.admin_dasboard.create');
    }

    function store(UserRequest $request){
       
        $data = $request->validated();

        User::create($data);

        return redirect()->back()->with('message','user added successfully');
    }

    public function edit($id){
        $book=Book::get();
        $user=User::findorfail($id);
        return view('admin.users.admin_dasboard.edit',compact('book','user'));
    }

    public function destroy($id){
        $user=User::findorfail($id);
        $user->delete();
        return redirect()->back()->with('message','deleted successfully');
    }

    public function update(UserRequest $request , $id){
        $data=$request->validated();
        $user=User::findorfail($id);
        $user->update($data);
        return redirect()->back()->with('message','updated successfully');
    }


}