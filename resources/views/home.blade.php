<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/CSS/home.css') }}">
    <title>الصفحة الرئيسية</title>
</head>
<body>
    @auth
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('admin.users.dashboard') }}" class="nav-link">لوحة التحكم</a>
        @else
            <a href="{{ route('user.userhome') }}" class="nav-link">الصفحة الشخصية</a>
        @endif
    @else
        <a href="{{ route('auth.login') }}" class="nav-link">تسجيل الدخول</a>
    @endauth
</body>
</html>