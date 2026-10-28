@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ asset('dashboard/assets/CSS/show.css') }}">

<div class="books-page">

    <header class="books-navbar">

        <a href="#" class="logo">
            <img src="{{asset('dashboard/assets/dashboard/final.png')}}" alt="رحلة كتاب">
        </a>


        <nav class="nav-links">

            <a href="{{ url('/') }}" class="active">
                الرئيسية
            </a>

            

            <a href="{{ route('report.show') }}">
                تواصل معنا
            </a>

            <a href="{{ route('reviews.index') }}">
                مراجعات القراء
            </a>

            <a href="{{ route('showbooks') }}">
                الكتب المتاحة
            </a>

            <a href="{{ route('user.profile', ['id' => auth()->id()]) }}">
                حسابي
            </a>

            <a href="{{ route('showmybooks', ['id' => auth()->id()]) }}">
                كتبي
            </a>

            <a href="{{ route('addbook') }}">
                إضافة كتاب
            </a>

        </nav>


        <div class="auth-buttons">
            <form action="{{ route('auth.logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="login-btn" style="border:none; cursor:pointer;">تسجيل الخروج</button>
            </form>
        </div>

    </header>

    <section class="books-header">

        <h1>
            الكتب المتاحة
        </h1>

        <p>
            اكتشف الكتب المتاحة وابدأ رحلة جديدة مع كتاب تحبه
        </p>

    </section>

<div class="books-container">
    @foreach ($otherbooks as $book)
        <div class="book-item">
            <div class="book-card">
                <div class="book-image">
                    <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}">
                </div>
                <h3>{{ $book->title }}</h3>
                <p class="book-info">صاحب الكتاب: {{ $book->user->name }}</p>
                <p class="book-info">النوع: {{ $book->type }}</p>
                <p class="book-info">الحالة: {{ $book->state }}</p>
                <p class="book-info">المكان: {{ $book->user->location }}</p>
                <p class="myphone" hidden>{{ $book->user->phone }}</p>
            </div>

            <!-- <button type="button" class="request-btn" onclick="showphone(this)">
                اطلب الكتاب
            </button> -->

            @if($book->state == 'غير متاح')
            <button class="request-btn" disabled>غير متاح حالياً</button>
            @else
             <button class="request-btn" onclick="showphone(this)">اطلب الكتاب </button>
            @endif
        </div>
    @endforeach
    </div>

<script>
    function showphone(btn){
        const divContainer = btn.previousElementSibling;
        const myphone = divContainer.querySelector('.myphone');
        if(myphone){
            myphone.removeAttribute('hidden');
        };
    }
</script>
@endsection