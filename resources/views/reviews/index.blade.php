@extends('layouts.app')

@section('title', 'آراء المستخدمين')

@section('content')
    <div class="card">
        <h1>آراء المستخدمين</h1>
        <p class="muted">هنا تظهر كل آراء المستخدمين.</p>

        @auth
            <form method="POST" action="{{ route('reviews.store') }}">
                @csrf
                <label for="review">اكتب رأيك</label>
                <textarea id="review" name="review" required>{{ old('review') }}</textarea>
                <button type="submit">إضافة الرأي</button>
            </form>
        @else
            <p>لإضافة رأي جديد، يجب <a href="{{ route('login') }}" style="color:#2271d1;">تسجيل الدخول</a>.</p>
        @endauth
    </div>

    @forelse($reviews as $review)
        <div class="card">
            <div class="user-row">
                @if($review->user && $review->user->image)
                    <img class="avatar" src="{{ asset('storage/' . $review->user->image) }}" alt="صورة المستخدم">
                @else
                    <div class="avatar-placeholder">
                        {{ $review->user ? mb_substr($review->user->name, 0, 1) : '?' }}
                    </div>
                @endif

                <strong>{{ $review->user->name ?? 'مستخدم محذوف' }}</strong>
            </div>

            <div class="review-text">{{ $review->review }}</div>

            @auth
                @if($review->user_id === auth()->id())
                    <div class="actions">
                        <a class="btn" href="{{ route('reviews.edit', $review) }}">تعديل</a>

                        <form class="inline-form" method="POST" action="{{ route('reviews.destroy', $review) }}" onsubmit="return confirm('هل تريد حذف رأيك؟');">
                            @csrf
                            @method('DELETE')
                            <button class="btn-danger" type="submit">حذف</button>
                        </form>
                    </div>
                @endif
            @endauth
        </div>
    @empty
        <div class="card">
            <p>لا توجد آراء حتى الآن.</p>
        </div>
    @endforelse
@endsection
