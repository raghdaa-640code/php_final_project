@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('dashboard/assets/CSS/profile.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard/assets/CSS/show.css') }}">
@section('content')

<?php  
use Illuminate\Support\Facades\Auth;
$user = Auth::user(); ?>

<header class="books-navbar">
    <a href="{{ route('showbooks') }}" class="logo">
        <img src="{{ asset('storage/images/final.png') }}" alt="رحلة كتاب">
    </a>

    <nav class="nav-links">
        <a href="{{ url('/') }}">الرئيسية</a>
        <a href="{{ route('user.profile', $user->id) }}" class="active">حسابي</a>
        <a href="{{ route('showbooks') }}">الكتب المتاحة</a>
        <a href="{{ route('showmybooks', ['id' => $user->id]) }}">كتبي</a>
    </nav>

    <div class="auth-buttons">
        <a href="{{ route('auth.logout') }}" class="login-btn">تسجيل الخروج</a>
    </div>
</header>

<div class="profile-page">
    <div class="profile-card">
        <div class="profile-content">

            @if($user->image)
                <img src="{{ asset('storage/' . $user->image) }}"
                     class="profile-image"
                     alt="صورة المستخدم">
            @else
                <div class="profile-empty-image">لا توجد صورة</div>
            @endif

            <h3>{{ $user->name }}</h3>
            <hr>

            <div class="profile-details">
                <p>البريد الإلكتروني:{{ $user->email }}</p>
                <p>رقم الهاتف: {{ $user->phone }}</p>
                <p>الموقع: {{ $user->location }}</p>
                <p>
                    نوع الحساب:
                    {{ $user->is_admin }}
                </p>
            </div>

            <div class="profile-actions">
                <a href="{{ route('user.editprofile' , $user->id) }}" class="profile-button profile-edit">
                    تعديل البيانات
                </a>
                <a href="{{ route('user.deleteuser', $user->id) }}" class="profile-button profile-delete">
                    حذف الحساب
                </a>
            </div>

        </div>
    </div>
</div>
@endsection