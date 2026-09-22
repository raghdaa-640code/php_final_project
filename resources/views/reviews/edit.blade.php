@extends('layouts.app')

@section('title', 'تعديل الرأي')

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
