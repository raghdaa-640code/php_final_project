@extends('layouts.app')

@section('title', 'البحث عن كتاب')

@push('styles')
<style>
/* =========================
   Search Page
========================= */

.search-page-title {
    text-align: center;
    margin-bottom: 28px;
}

.search-page-title h1 {
    color: #4D0E13;
    font-size: 26px;
    font-weight: 700;
    margin-bottom: 6px;
}

.search-page-title p {
    color: #806D6D;
    font-size: 14px;
}

/* =========================
   Search Form Card
========================= */

.search-form-card {
    background: #FFFFFF;
    border: 1px solid rgba(77, 14, 19, 0.12);
    border-radius: 16px;
    padding: 24px;
    margin-bottom: 28px;
    box-shadow: 0 6px 20px rgba(77, 14, 19, 0.06);
}

.search-form-row {
    display: flex;
    gap: 14px;
    flex-wrap: wrap;
    align-items: flex-end;
}

.search-form-group {
    flex: 1;
    min-width: 180px;
}

.search-form-group label {
    display: block;
    margin-bottom: 6px;
    color: #4D0E13;
    font-size: 13px;
    font-weight: 600;
}

.search-form-group input {
    width: 100%;
    padding: 10px 14px;
    border: 1px solid #D8CCC5;
    border-radius: 9px;
    background: #FCF9F6;
    color: #3E2A2B;
    font-size: 14px;
    outline: none;
    transition: 0.2s;
    margin: 0;
}

.search-form-group input:focus {
    border-color: #C8A49F;
    background: #FFFFFF;
    box-shadow: 0 0 0 3px rgba(200, 164, 159, 0.18);
}

.search-btn {
    border: none;
    background: #4D0E13;
    color: #FFFFFF;
    padding: 10px 28px;
    border-radius: 9px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.25s;
    white-space: nowrap;
}

.search-btn:hover {
    background: #351014;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(77, 14, 19, 0.18);
}

/* =========================
   Results Count
========================= */

.results-info {
    color: #806D6D;
    font-size: 14px;
    margin-bottom: 16px;
}

.results-info span {
    color: #4D0E13;
    font-weight: 700;
}

/* =========================
   Book Cards Grid
========================= */

.books-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.book-result-card {
    background: #FFFFFF;
    border: 1px solid rgba(77, 14, 19, 0.10);
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 4px 14px rgba(77, 14, 19, 0.06);
    transition: 0.25s;
    display: flex;
    flex-direction: column;
}

.book-result-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(77, 14, 19, 0.12);
}

.book-result-card .book-cover {
    width: 100%;
    height: 190px;
    object-fit: cover;
    background: #F0E6DC;
    display: flex;
    align-items: center;
    justify-content: center;
}

.book-result-card .book-cover img {
    width: 100%;
    height: 190px;
    object-fit: cover;
}

.book-cover-placeholder {
    width: 100%;
    height: 190px;
    background: linear-gradient(135deg, #EEE4DA, #D8C4AC);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #C8A49F;
    font-size: 48px;
}

.book-result-body {
    padding: 16px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.book-result-body h3 {
    color: #4D0E13;
    font-size: 15px;
    font-weight: 700;
    margin-bottom: 10px;
    line-height: 1.4;
}

.book-result-body .book-meta {
    font-size: 13px;
    color: #806D6D;
    margin-bottom: 5px;
    display: flex;
    align-items: center;
    gap: 5px;
}

.book-result-body .book-meta i {
    color: #C8A49F;
    width: 16px;
}

.state-badge {
    display: inline-block;
    padding: 3px 10px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    margin-top: 8px;
}

.state-available {
    background: #E8F5E9;
    color: #2E7D32;
}

.state-unavailable {
    background: #FFEBEE;
    color: #C62828;
}

.request-phone-btn {
    margin-top: auto;
    padding-top: 12px;
    border-top: 1px solid #F0E6DC;
}

.request-phone-btn button {
    width: 100%;
    border: none;
    background: #4D0E13;
    color: #fff;
    padding: 9px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.2s;
}

.request-phone-btn button:hover {
    background: #351014;
}

.request-phone-btn button:disabled {
    background: #ccc;
    cursor: not-allowed;
}

.phone-reveal {
    margin-top: 8px;
    text-align: center;
    font-size: 13px;
    color: #2E7D32;
    font-weight: 600;
    display: none;
}

/* =========================
   Empty / Hint States
========================= */

.search-hint, .no-results {
    background: #FCF9F6;
    border: 1px solid rgba(77, 14, 19, 0.08);
    border-radius: 14px;
    padding: 40px 20px;
    text-align: center;
    color: #806D6D;
    font-size: 15px;
}

.search-hint i, .no-results i {
    display: block;
    font-size: 40px;
    margin-bottom: 12px;
    color: #C8A49F;
}

@media (max-width: 600px) {
    .search-form-row { flex-direction: column; }
    .search-btn { width: 100%; }
    .books-grid { grid-template-columns: 1fr; }
}
</style>
@endpush

@section('content')

<div class="search-page-title">
    <h1>🔍 البحث عن كتاب</h1>
    <p>ابحث عن كتاب بالاسم أو النوع وابدأ رحلة جديدة</p>
</div>

{{-- ==================== SEARCH FORM ==================== --}}
<div class="search-form-card">
    <form method="GET" action="{{ route('search') }}">
        <div class="search-form-row">

            <div class="search-form-group">
                <label for="title"><i class="fa-solid fa-book" style="margin-left:4px;"></i>اسم الكتاب</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ $title ?? '' }}"
                    placeholder="ابحث باسم الكتاب..."
                    autocomplete="off"
                >
            </div>

            <div class="search-form-group">
                <label for="type"><i class="fa-solid fa-tags" style="margin-left:4px;"></i>نوع الكتاب</label>
                <input
                    type="text"
                    id="type"
                    name="type"
                    value="{{ $type ?? '' }}"
                    placeholder="مثال: رواية، علمي، ديني..."
                    autocomplete="off"
                >
            </div>

            <button type="submit" class="search-btn">
                <i class="fa-solid fa-magnifying-glass" style="margin-left:5px;"></i>
                بحث
            </button>

        </div>
    </form>
</div>

{{-- ==================== RESULTS ==================== --}}
@if(!empty($title) || !empty($type))

    @if($books->isNotEmpty())

        <p class="results-info">
            تم العثور على <span>{{ $books->count() }}</span> نتيجة
            @if(!empty($title)) للكتاب "<span>{{ $title }}</span>" @endif
            @if(!empty($type)) من نوع "<span>{{ $type }}</span>" @endif
        </p>

        <div class="books-grid">
            @foreach($books as $book)
                <div class="book-result-card">

                    {{-- صورة الكتاب --}}
                    @if($book->image)
                        <div class="book-cover">
                            <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}">
                        </div>
                    @else
                        <div class="book-cover-placeholder">
                            <i class="fa-solid fa-book"></i>
                        </div>
                    @endif

                    <div class="book-result-body">
                        <h3>{{ $book->title }}</h3>

                        <p class="book-meta">
                            <i class="fa-solid fa-user"></i>
                            {{ $book->user->name ?? 'غير معروف' }}
                        </p>

                        <p class="book-meta">
                            <i class="fa-solid fa-tag"></i>
                            {{ $book->type }}
                        </p>

                        @if($book->user && $book->user->location)
                            <p class="book-meta">
                                <i class="fa-solid fa-location-dot"></i>
                                {{ $book->user->location }}
                            </p>
                        @endif

                        @if($book->state === 'متاح' || $book->state === 'available')
                            <span class="state-badge state-available">✅ متاح</span>
                        @else
                            <span class="state-badge state-unavailable">❌ غير متاح</span>
                        @endif

                        <div class="request-phone-btn">
                            @if($book->state === 'متاح' || $book->state === 'available')
                                <button type="button" onclick="revealPhone(this, '{{ $book->user->phone ?? '' }}')">
                                    <i class="fa-solid fa-phone" style="margin-left:5px;"></i>
                                    اطلب الكتاب الآن
                                </button>
                                <div class="phone-reveal">
                                    📞 {{ $book->user->phone ?? 'رقم غير متوفر' }}
                                </div>
                            @else
                                <button type="button" disabled>غير متاح حالياً</button>
                            @endif
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    @else
        <div class="no-results">
            <i class="fa-solid fa-face-frown-open"></i>
            لم يتم العثور على أي كتاب مطابق لبحثك.
            <br><small style="margin-top:8px; display:block;">حاول بكلمات مختلفة أو تصفح <a href="{{ route('showbooks') }}" style="color:#4D0E13; font-weight:600;">الكتب المتاحة</a></small>
        </div>
    @endif

@else
    <div class="search-hint">
        <i class="fa-solid fa-magnifying-glass"></i>
        أدخل اسم الكتاب أو نوعه في حقول البحث أعلاه للبدء.
    </div>
@endif

<script>
function revealPhone(btn, phone) {
    const phoneDiv = btn.parentElement.querySelector('.phone-reveal');
    if (phoneDiv) {
        phoneDiv.style.display = 'block';
        btn.style.display = 'none';
    }
}
</script>

@endsection
