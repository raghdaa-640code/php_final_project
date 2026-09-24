@extends('layouts.app')
@section('content')

<!-- <link rel="stylesheet" href="{{ asset('dashboard/assets/CSS/userhome.css') }}">

    <div class="user-home-container">

    <h1 class="welcome-message">أهلاً بك يا {{ auth()->user()->name }} في منصتنا!</h1>

    <div class="links-section">
        
        <a href="{{ route('user.showbooks') }}" class="nav-link">تصفح الكتب</a>
    <a href="{{ route('user.showmybooks',['id' => auth()->id()]) }}" class="nav-link">كتبي</a>
        <a href="{{ route('user.profile',['id' => auth()->id()]) }}" class="nav-link">الملف الشخصي</a>
    </div>
</div> -->
<link rel="stylesheet" href="{{ asset('dashboard/assets/CSS/userhome.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="user-home-container">

    <header class="welcome-section">
        <h1 class="welcome-message">أهلاً بك يا <span>{{ auth()->user()->name }}</span> في منصتنا!</h1>
    </header>

    <div class="cards-grid">
        
        <a href="{{ route('user.showbooks') }}" class="home-card">
            <div class="card-icon"><i class="fa-solid fa-book-open"></i></div>
            <h3>الكتب المعروضة</h3>
        </a>

        <a href="{{ route('user.showmybooks', ['id' => auth()->id()]) }}" class="home-card">
            <div class="card-icon"><i class="fa-solid fa-book"></i></div>
            <h3>الكتب التي عرضتها</h3>
        </a>
        <a href="{{route('reviews.index')}}" class="home-card">
            <div class="card-icon"><i class="fa-solid fa-comments"></i></div>
            <h3>الآراء</h3>
        </a>

        <a href="" class="home-card">
            <div class="card-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
            <h3>الإبلاغ عن مشكلة</h3>
        </a>

    </div>

</div>

@endsection