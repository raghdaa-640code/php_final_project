@extends('layouts.app')

@section('title', 'إدارة الآراء')

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
   Page Title
========================= */

.card h1 {
    margin: 0 0 25px;

    color: #4D0E13;

    font-size: 25px;
    font-weight: 700;
}


/* =========================
   Add Review Form
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
   Buttons
========================= */

.card button {
    border: none;

    background: #4D0E13;

    color: #FFFFFF;

    padding: 10px 22px;

    border-radius: 8px;

    font-size: 14px;
    font-weight: 600;

    cursor: pointer;

    transition: 0.25s;
}


.card button:hover {
    background: #351014;

    transform: translateY(-1px);

    box-shadow:
        0 5px 12px rgba(77, 14, 19, 0.16);
}


/* =========================
   Actions
========================= */

.actions {
    display: flex;

    justify-content: flex-start;

    margin-top: 15px;
}


/* =========================
   Delete Button
========================= */

.card button.btn-danger {
    background: #7A252B;
}


.card button.btn-danger:hover {
    background: #5A171C;
}


/* =========================
   User
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
   Empty State
========================= */

.card p {
    color: #806D6D;

    margin: 0;

    font-size: 15px;
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
        width: 100%;
    }

    .actions form {
        width: 100%;
    }

    .actions button {
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
