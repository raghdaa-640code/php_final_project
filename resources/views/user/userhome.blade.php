
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/CSS/userhome.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/CSS/home.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/CSS/logout.css') }}">
    <title>صفحة المستخدم</title>
    
</head>
<body>

    @include('layouts.navbar')

    <div class="user-home-container">

    <h1 class="welcome-message">أهلاً بك يا {{ auth()->user()->name }} في منصتنا!</h1>

    <div class="links-section">
        
        <a href="{{ route('showbooks') }}" class="nav-link">تصفح الكتب</a>

        <a href="{{ route('user.profile',['id' => auth()->id()]) }}" class="nav-link">الملف الشخصي</a>
    </div>
</div>

</body>
</html>