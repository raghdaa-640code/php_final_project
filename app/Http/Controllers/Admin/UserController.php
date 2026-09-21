<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
// use App\Models\Department;
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

    // public function edit($id){
    //     $departments=Department::get();
    //     $student=Student::findorfail($id);
    //     return view('admin.students.edit',compact('departments','student'));
    // }

    public function destroy($id){
        $user=User::findorfail($id);
        $user->delete();
        return redirect()->back()->with('msg','deleted successfully');
    }

    // public function update(StudentRequest $request , $id){
    //     $data=$request->validated();
    //     $student=Student::findorfail($id);
    //     $student->update($data);
    //     return redirect()->back()->with('msg','updated successfully');
    // }


}