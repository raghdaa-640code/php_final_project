<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    private function checkAdmin(): void
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'هذه الصفحة خاصة بالمسؤول.');
        }
    }

    public function index()
    {
        $this->checkAdmin();

        $reports = report::with('user')->latest()->get();

        return view('admin.reports.index', compact('reports'));
    }

    public function reply(Request $request, report $report)
    {
        $this->checkAdmin();

        $request->validate([
            'admin_reply' => 'required|string|max:2000',
        ]);

        $report->update([
            'admin_reply' => $request->admin_reply,
        ]);

        return redirect()->route('admin.reports.index')
            ->with('success', 'تم إرسال الرد على البلاغ.');
    }
}
