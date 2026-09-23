<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
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

        $reviews = review::with('user')->latest()->get();

        return view('admin.reviews.index', compact('reviews'));
    }

    public function store(Request $request)
    {
        $this->checkAdmin();

        $request->validate([
            'review' => 'required|string|max:2000',
        ]);

        review::create([
            'review' => $request->review,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('admin.reviews.index')
            ->with('success', 'تم إضافة الرأي.');
    }

    public function destroy(review $review)
    {
        $this->checkAdmin();

        $review->delete();

        return redirect()->route('admin.reviews.index')
            ->with('success', 'تم حذف الرأي.');
    }

    public function destroyAll()
    {
        $this->checkAdmin();

        review::query()->delete();

        return redirect()->route('admin.reviews.index')
            ->with('success', 'تم حذف كل الآراء.');
    }
}
