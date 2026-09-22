<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\report;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'يجب تسجيل الدخول لرؤية بلاغاتك.');
        }

        $reports = report::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('report', compact('reports'));
    }
}
