<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    
    public function search(Request $request)
    {
        return view('search');
    }

    
    public function index()
    {
        return view('report.index');
    }

    public function show($id)
    {
        return view('report.show', compact('id'));
    }

    public function create()
    {
        return view('report.create');
    }

    public function store(Request $request)
    {
        return redirect()->back()->with('success', 'تم إرسال الشكوى بنجاح');
    }

    public function edit($id)
    {
        return view('report.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('reports.show', $id)->with('success', 'تم تعديل الشكوى');
    }

    public function destroy($id)
    {
        return redirect()->route('reports.index')->with('success', 'تم حذف الشكوى');
    }
}