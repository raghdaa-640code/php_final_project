@extends('layouts.app')

@section('title', 'آراء المستخدمين')

@push('styles')
<style>
/* =========================
   Reviews Page
========================= */

.card {
    background: #FFFFFF;
    border: 1px solid rgba(77, 14, 19, 0.12);
    border-radius: 16px;
    padding: 24px;
    margin-bottom: 20px;

    box-shadow: 0 6px 20px rgba(77, 14, 19, 0.06);
}


/* =========================
   Title
========================= */

.card h1 {
    margin: 0 0 25px;

    color: #4D0E13;

    font-size: 25px;

    font-weight: 700;
}


/* =========================
   Form
========================= */

.card label {
    display: block;

    margin-bottom: 8px;

    color: #3E2A2B;

    font-size: 14px;
    font-weight: 600;
}


.card textarea {
    width: 100%;

    min-height: 110px;

    padding: 12px 14px;

    resize: vertical;

    border: 1px solid #D8CCC5;
    border-radius: 9px;

    background: #FCF9F6;

    color: #3E2A2B;

    font-family: Arial, sans-serif;
    font-size: 14px;

    line-height: 1.7;

    outline: none;

    transition: 0.25s;

    margin-bottom: 12px;
}


.card textarea:focus {
    border-color: #C8A49F;

    background: #FFFFFF;

    box-shadow:
        0 0 0 3px rgba(200, 164, 159, 0.18);
}


/* =========================
   Add Review Button
========================= */

.card button,
.card .btn {
    display: inline-block;

    border: none;

    background: #4D0E13;

    color: #FFFFFF;

    padding: 10px 22px;

    border-radius: 8px;

    font-size: 14px;
    font-weight: 600;

    text-decoration: none;

    cursor: pointer;

    transition: 0.25s;
}


.card button:hover,
.card .btn:hover {
    background: #351014;

    transform: translateY(-1px);

    box-shadow:
        0 5px 12px rgba(77, 14, 19, 0.16);
}


/* =========================
   Login Message
========================= */

.card p {
    color: #806D6D;

    font-size: 15px;

    line-height: 1.8;

    margin: 0;
}


.card p a {
    color: #4D0E13 !important;

    font-weight: 600;

    text-decoration: none;
}


.card p a:hover {
    color: #C8A49F !important;

    text-decoration: underline;
}


/* =========================
   User Row
========================= */

.user-row {
    display: flex;

    align-items: center;

    gap: 12px;

    margin-bottom: 16px;
}


.user-row strong {
    color: #3E2A2B;

    font-size: 16px;
}


/* =========================
   Avatar
========================= */

.avatar,
.avatar-placeholder {
    width: 45px;
    height: 45px;

    border-radius: 50%;

    flex-shrink: 0;
}


.avatar {
    object-fit: cover;
}


.avatar-placeholder {
    display: flex;

    align-items: center;
    justify-content: center;

    background: #C8A49F;

    color: #4D0E13;

    font-size: 18px;
    font-weight: 700;
}


/* =========================
   Review Text
========================= */

.review-text {
    background: #F8F1EA;

    border-right: 4px solid #C8A49F;

    border-radius: 10px;

    padding: 15px 16px;

    color: #3E2A2B;

    font-size: 14px;

    line-height: 1.8;
}


/* =========================
   Actions
========================= */

.actions {
    display: flex;

    align-items: center;

    gap: 10px;

    margin-top: 15px;
}


.inline-form {
    display: inline;
}


/* =========================
   Edit Button
========================= */

.actions .btn,
.card .btn,
.card button[type="submit"],
.actions button {
    display: inline-block;

    border: none;

    background: #4D0E13;

    color: #FFFFFF;

    padding: 10px 22px;

    border-radius: 8px;

    font-size: 14px;
    font-weight: 600;

    text-decoration: none;

    cursor: pointer;

    transition: 0.25s;
}


.actions .btn:hover,
.card .btn:hover,
.card button[type="submit"]:hover,
.actions button:hover {
    background: #351014;

    transform: translateY(-1px);

    box-shadow: 0 5px 12px rgba(77, 14, 19, 0.16);
}


/* =========================
   Delete Button
========================= */

.actions .btn-danger,
.card .btn-danger {
    background: #7A252B;
}


.actions .btn-danger:hover,
.card .btn-danger:hover {
    background: #5A171C;
}


/* =========================
   Empty State
========================= */

.card p {
    margin: 0;
}


/* =========================
   Responsive
========================= */

@media (max-width: 600px) {

    .card {
        padding: 18px;

        border-radius: 13px;
    }

    .card h1 {
        font-size: 21px;
    }

    .actions {
        flex-direction: column;

        align-items: stretch;
    }

    .actions .btn,
    .actions button {
        width: 100%;

        text-align: center;
    }

    .inline-form {
        width: 100%;
    }

    .card button {
        width: 100%;
    }
}
</style>
@endpush

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
            @if(Route::has('login'))
                <p>لإضافة رأي جديد، يجب <a href="{{ route('auth.login') }}" style="color:#2271d1;">تسجيل الدخول</a>.</p>
            @else
                <p>لإضافة رأي جديد، يرجى تسجيل الدخول أولاً.</p>
            @endif
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
