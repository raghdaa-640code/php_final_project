@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="{{ asset('dashboard/assets/CSS/userhome.css') }}">

    <div class="user-home-container">

    <h1 class="welcome-message">أهلاً بك يا {{ auth()->user()->name }} في منصتنا!</h1>

    <div class="links-section">
        
        <a href="{{ route('user.showbooks') }}" class="nav-link">تصفح الكتب</a>
    <a href="{{ route('user.showmybooks',['id' => auth()->id()]) }}" class="nav-link">كتبي</a>
        <a href="{{ route('user.profile',['id' => auth()->id()]) }}" class="nav-link">الملف الشخصي</a>
    </div>
</div>

@endsection