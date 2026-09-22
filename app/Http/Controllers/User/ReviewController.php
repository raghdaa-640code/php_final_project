<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = review::with('user')->latest()->get();

        return view('reviews.index', compact('reviews'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'يجب تسجيل الدخول لإضافة رأي.');
        }

        $request->validate([
            'review' => 'required|string|max:2000',
        ]);

        review::create([
            'review' => $request->review,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('reviews.index')
            ->with('success', 'تم إضافة رأيك بنجاح.');
    }

    public function edit(review $review)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'يجب تسجيل الدخول لتعديل رأيك.');
        }

        if ($review->user_id !== Auth::id()) {
            abort(403, 'لا يمكنك تعديل رأي مستخدم آخر.');
        }

        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, review $review)
    {
        if ($review->user_id !== Auth::id()) {
            abort(403, 'لا يمكنك تعديل رأي مستخدم آخر.');
        }

        $request->validate([
            'review' => 'required|string|max:2000',
        ]);

        $review->update([
            'review' => $request->review,
        ]);

        return redirect()->route('reviews.index')
            ->with('success', 'تم تعديل رأيك بنجاح.');
    }

    public function destroy(review $review)
    {
        if ($review->user_id !== Auth::id()) {
            abort(403, 'لا يمكنك حذف رأي مستخدم آخر.');
        }

        $review->delete();

        return redirect()->route('reviews.index')
            ->with('success', 'تم حذف رأيك.');
    }
}
