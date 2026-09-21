<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
// use App\Models\Department;
// use App\Http\Requests\StudentRequest;

class UserController extends Controller
{
   
    // public function show($id){
    //     $student=Student::findorfail($id);
    //     return view('admin.students.show',compact('student'));
    // }

    // public function create(){
    //     $departments=Department::get();
    //     return view('admin.students.create',compact('departments'));
    // }

    // function store(StudentRequest $request){
       
    //     $data = $request->validated();

    //     Student::create($data);

    //     return redirect()->back()->with('message','student added successfully');
    // }

    // public function edit($id){
    //     $departments=Department::get();
    //     $student=Student::findorfail($id);
    //     return view('admin.students.edit',compact('departments','student'));
    // }

    // public function destroy($id){
    //     $student=Student::findorfail($id);
    //     $student->delete();
    //     return redirect()->back()->with('msg','deleted successfully');
    // }

    // public function update(StudentRequest $request , $id){
    //     $data=$request->validated();
    //     $student=Student::findorfail($id);
    //     $student->update($data);
    //     return redirect()->back()->with('msg','updated successfully');
    // }


}