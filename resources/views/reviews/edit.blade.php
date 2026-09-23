@extends('layouts.app')

@section('title', 'تعديل الرأي')

@push('styles')
<style>
.card {
    background: #FFFFFF;
    border: 1px solid rgba(77, 14, 19, 0.12);
    border-radius: 16px;
    padding: 24px;
    margin-bottom: 20px;
    box-shadow: 0 6px 20px rgba(77, 14, 19, 0.06);
}

.card h1 {
    margin: 0 0 25px;
    color: #4D0E13;
    font-size: 25px;
    font-weight: 700;
}

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
    box-shadow: 0 0 0 3px rgba(200, 164, 159, 0.18);
}

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
    box-shadow: 0 5px 12px rgba(77, 14, 19, 0.16);
}

.card .btn-secondary {
    background: #806D6D;
}

.card .btn-secondary:hover {
    background: #5F4F4F;
}

.actions {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: 15px;
}

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
}
</style>
@endpush

@section('content')
    <div class="card">
        <h1>تعديل رأيك</h1>

        <form method="POST" action="{{ route('reviews.update', $review) }}">
            @csrf
            @method('PUT')

            <label for="review">الرأي</label>
            <textarea id="review" name="review" required>{{ old('review', $review->review) }}</textarea>

            <div class="actions">
                <button type="submit">حفظ التعديل</button>
                <a class="btn btn-secondary" href="{{ route('reviews.index') }}">إلغاء</a>
            </div>
        </form>
    </div>
@endsection
