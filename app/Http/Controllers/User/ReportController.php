<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\report;
use App\Models\book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function search(Request $request)
    {
        $title = $request->get('title', '');
        $type  = $request->get('type', '');

        $books = collect();

        if (!empty($title) || !empty($type)) {
            $query = book::with('user');

            if (!empty($title)) {
                $query->where('title', 'like', '%' . $title . '%');
            }

            if (!empty($type)) {
                $query->where('type', 'like', '%' . $type . '%');
            }

            $books = $query->get();
        }

        return view('search', compact('books', 'title', 'type'));
    }

    public function show(): View
    {
        $myReports = collect();

        if (Auth::check()) {
            $myReports = report::where('user_id', Auth::id())->latest()->get();
        }

        return view('report', compact('myReports'));
    }

    public function report()
    {
        $myReports = collect();

        if (Auth::check()) {
            $myReports = report::where('user_id', Auth::id())->latest()->get();
        }

        return view('report', compact('myReports'));
    }

    public function submitReport(Request $request)
    {
        $request->validate([
            'report' => 'required|string|min:10|max:2000',
        ], [
            'report.required' => 'يرجى كتابة محتوى البلاغ.',
            'report.min'      => 'البلاغ يجب أن يكون 10 أحرف على الأقل.',
        ]);

        report::create([
            'report'  => $request->report,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('report.show')
            ->with('success', 'تم إرسال البلاغ بنجاح! سيتم الرد عليك قريباً.');
    }

    public function edit($id)
    {
        $report = report::findOrFail($id);
        return view('report.edit', compact('report'));
    }

    public function update(Request $request, $id)
    {
        $report = report::findOrFail($id);
        $report->update(['report' => $request->report]);
        return redirect()->route('report.show')->with('success', 'تم تعديل البلاغ بنجاح.');
    }

    public function destroy($id)
    {
        $report = report::findOrFail($id);
        $report->delete();
        return redirect()->route('report.show')->with('success', 'تم حذف البلاغ بنجاح.');
    }
}
