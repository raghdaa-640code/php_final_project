<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'المكتبة')</title>
    <style>
        /* * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: Arial, Tahoma, sans-serif;
            background: #f5f6fa;
            color: #222;
        }
        a { text-decoration: none; color: inherit; }
        .navbar {
            background: #222;
            color: white;
            padding: 14px 6%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }
        .navbar-links { display: flex; gap: 15px; align-items: center; flex-wrap: wrap; }
        .navbar a { color: white; }
        .container { width: 90%; max-width: 1000px; margin: 30px auto; }
        .card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 18px;
            box-shadow: 0 2px 10px rgba(0,0,0,.07);
        }
        .user-row { display: flex; align-items: center; gap: 12px; margin-bottom: 12px; }
        .avatar {
            width: 55px; height: 55px; border-radius: 50%;
            object-fit: cover; border: 2px solid #ddd;
            background: #eee;
        }
        .avatar-placeholder {
            width: 55px; height: 55px; border-radius: 50%;
            background: #ddd; display: flex; align-items: center; justify-content: center;
            font-weight: bold; color: #666;
        }
        .review-text, .report-text { line-height: 1.8; white-space: pre-wrap; }
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
        textarea { min-height: 110px; resize: vertical; }
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
        .actions { display: flex; gap: 8px; flex-wrap: wrap; margin-top: 12px; }
        .inline-form { display: inline; }
        .alert {
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            background: #e8f5e9;
            color: #256029;
        }
        .error { background: #ffebee; color: #b71c1c; }
        .muted { color: #777; }
        .admin-box { border-top: 1px solid #eee; margin-top: 15px; padding-top: 15px; } */
    </style>
</head>
<body>
<nav class="navbar">
    <div>
        <a href="{{ route('reviews.index') }}">المكتبة</a>
    </div>
    <div class="navbar-links">
        <a href="{{ route('reviews.index') }}">الآراء</a>
        @auth
            <a href="{{ route('reports.user') }}">بلاغاتي</a>
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin.reports.index') }}">بلاغات الأدمن</a>
                <a href="{{ route('admin.reviews.index') }}">آراء الأدمن</a>
            @endif
            <form class="inline-form" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-secondary">تسجيل الخروج</button>
            </form>
        @else
            <a href="{{ route('login') }}">تسجيل الدخول</a>
        @endauth
    </div>
</nav>

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
