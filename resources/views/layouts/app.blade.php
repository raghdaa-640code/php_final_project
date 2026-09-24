<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'المكتبة')</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: Arial, Tahoma, sans-serif;
            background: #f5f6fa;
            color: #222;
        }
        a { text-decoration: none; color: inherit; }
        .navbar {
            width: 100%;
            height: 67px;
            padding: 0 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #EEE4DA;
            border-bottom: 1px solid rgba(77, 14, 19, 0.08);
        }
        .logo { display: flex; align-items: center; text-decoration: none; }
        .logo img { width: 125px; height: auto; display: block; }
        .nav-links { display: flex; align-items: center; gap: 32px; }
        .nav-links a {
            position: relative;
            color: #4D0E13;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            padding: 24px 0;
            transition: 0.25s;
        }
        .nav-links a:hover { color: #A9827D; }
        .nav-links a.active::after {
            content: "";
            position: absolute;
            right: 0;
            left: 0;
            bottom: 11px;
            height: 2px;
            background: #4D0E13;
        }
        .auth-buttons {
            display: flex;
            align-items: center;
            gap: 8px;
            order: 3;
        }
        .auth-buttons a,
        .auth-buttons .login-btn,
        .auth-buttons .register-btn,
        .auth-buttons .logout-button,
        .auth-buttons span.login-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 38px;
            padding: 9px 18px;
            border-radius: 25px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            transition: 0.25s;
            white-space: nowrap;
        }
        .login-btn {
            color: #4D0E13;
            border: 1px solid #4D0E13;
            background: transparent;
        }
        .login-btn:hover { background: #4D0E13; color: #FFFFFF; }
        .register-btn {
            background: #4D0E13;
            color: #FFFFFF;
            border: 1px solid #4D0E13;
        }
        .register-btn:hover { background: #3A080C; }
        .logout-form { margin: 0; }
        .logout-button {
            border: 1px solid #4D0E13;
            background: #4D0E13;
            color: #FFFFFF;
            font: inherit;
            cursor: pointer;
        }
        .logout-button:hover { background: #3A080C; }
        @media (max-width: 1050px) {
            .navbar { padding: 0 4%; }
            .nav-links { gap: 18px; }
        }
        @media (max-width: 700px) {
            .navbar {
                height: auto;
                min-height: 70px;
                padding: 10px 5%;
                flex-wrap: wrap;
                gap: 10px;
            }
            .logo { order: 1; }
            .logo img { width: 105px; }
            .auth-buttons { order: 2; }
            .auth-buttons a, .logout-button {
                padding: 7px 11px;
                font-size: 10px;
            }
            .nav-links {
                order: 3;
                width: 100%;
                justify-content: center;
                gap: 18px;
                overflow-x: auto;
                padding: 5px 0;
            }
            .nav-links a {
                white-space: nowrap;
                padding: 7px 0;
                font-size: 11px;
            }
            .nav-links a.active::after { bottom: 0; }
        }
        @media (max-width: 400px) {
            .auth-buttons .login-btn { display: none; }
            .nav-links { gap: 14px; }
        }
        .container {
            width: 90%;
            max-width: 1000px;
            margin: 30px auto;
        }
        .card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 18px;
            box-shadow: 0 2px 10px rgba(0,0,0,.07);
        }
        .user-row {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
        }
        .avatar {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ddd;
            background: #eee;
        }
        .avatar-placeholder {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            background: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #666;
        }
        .review-text, .report-text {
            line-height: 1.8;
            white-space: pre-wrap;
        }
        .reply {
            margin-top: 15px;
            padding: 15px;
            background: #f1f7ff;
            border-right: 4px solid #2271d1;
            border-radius: 8px;
        }
        textarea, input {
            width: 100%;
            padding: 11px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin: 7px 0 12px;
            font: inherit;
        }
        textarea {
            min-height: 110px;
            resize: vertical;
        }
        button, .btn {
            display: inline-block;
            border: 0;
            border-radius: 8px;
            padding: 9px 15px;
            cursor: pointer;
            background: #2271d1;
            color: white;
            font: inherit;
        }
        .btn-danger { background: #c62828; }
        .btn-secondary { background: #666; }
        .actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            margin-top: 12px;
        }
        .inline-form { display: inline; }
        .alert {
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            background: #e8f5e9;
            color: #256029;
        }
        .error {
            background: #ffebee;
            color: #b71c1c;
        }
        .muted { color: #777; }
        .admin-box {
            border-top: 1px solid #eee;
            margin-top: 15px;
            padding-top: 15px;
        }
    </style>
    @stack('styles')
</head>
<body>
<header class="navbar">
    <a href="{{ route('reviews.index') }}" class="logo">
        <img src="{{asset('dashboard/assets/dashboard/final.png')}}" alt="رحلة كتاب">
    </a>

    <nav class="nav-links">
        <a href="{{route('home')}}" class="{{ request()->routeIs('home') ? 'active' : '' }}">الرئيسية</a>
        <a href="{{route('report.show')}}">تواصل معنا</a>
        <a href="{{route('reviews.index')}}">مراجعات القراء</a>
        <a href="{{route('showbooks')}}">الكتب المتاحة</a>
    </nav>

    <div class="auth-buttons">
        @auth
            @if(Route::has('auth.logout'))
                <form class="logout-form" method="POST" action="{{ route('auth.logout') }}">
                    @csrf
                    <button type="submit" class="logout-button">تسجيل الخروج</button>
                </form>
            @else
                <span class="logout-button">تم تسجيل الدخول</span>
            @endif
        @else
            @if(Route::has('auth.login'))
                <a href="{{ route('auth.login') }}" class="login-btn">تسجيل الدخول</a>
                <a href="{{ route('auth.login') }}" class="register-btn">إنشاء حساب</a>
            @else
                <span class="login-btn">تسجيل الدخول</span>
            @endif
        @endauth
    </div>
</header>

<div class="container">
    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert error">{{ session('error') }}</div>
    @endif

    @if($errors->any())
        <div class="alert error">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    @yield('content')
</div>
</body>
</html>

