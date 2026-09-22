@extends('layouts.app')

@section('title', 'إدارة الآراء')

@section('content')
    <div class="card">
        <h1>إدارة الآراء</h1>
        <p class="muted">هذه الصفحة خاصة بالمسؤول. يستطيع المسؤول إضافة رأي أو حذف رأي واحد أو حذف كل الآراء.</p>

        <form method="POST" action="{{ route('admin.reviews.store') }}">
            @csrf
            <label for="review">إضافة رأي</label>
            <textarea id="review" name="review" required>{{ old('review') }}</textarea>
            <button type="submit">إضافة الرأي</button>
        </form>

        @if($reviews->count() > 0)
            <div class="actions">
                <form method="POST" action="{{ route('admin.reviews.destroyAll') }}" onsubmit="return confirm('هل تريد حذف كل الآراء؟');">
                    @csrf
                    @method('DELETE')
                    <button class="btn-danger" type="submit">حذف كل الآراء</button>
                </form>
            </div>
        @endif
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

            <div class="actions">
                <form method="POST" action="{{ route('admin.reviews.destroy', $review) }}" onsubmit="return confirm('هل تريد حذف هذا الرأي؟');">
                    @csrf
                    @method('DELETE')
                    <button class="btn-danger" type="submit">حذف</button>
                </form>
            </div>
        </div>
    @empty
        <div class="card">
            <p>لا توجد آراء حتى الآن.</p>
        </div>
    @endforelse
@endsection
