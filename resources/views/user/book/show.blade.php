@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ asset('dashboard/assets/CSS/show.css') }}">

<div class="books-page">

    <header class="books-navbar">

        <a href="#" class="logo">
            <img src="{{asset('storage/images/final.png')}}" alt="رحلة كتاب">
        </a>


        <nav class="nav-links">

            <a href="{{ url('/') }}" class="active">
                الرئيسية
            </a>

            <a href="#">
                من نحن
            </a>

            <a href="#">
                تواصل معنا
            </a>

            <a href="#">
                مراجعات القراء
            </a>

            <a href="#">
                الكتب المتاحة
            </a>

            <a href="{{ route('user.profile', ['id' => auth()->id()]) }}">
                حسابي
            </a>

            <a href="{{ route('showmybooks', ['id' => auth()->id()]) }}">
                كتبي
            </a>

        </nav>


        <div class="auth-buttons">
            <a href="{{ route('auth.logout') }}" class="login-btn">
                تسجيل الخروج
            </a>
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

            <button type="button" class="request-btn" onclick="showphone(this)">
                اطلب الكتاب
            </button>
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