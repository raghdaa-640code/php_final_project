<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>رحلة كتاب | صفحتي</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/CSS/userhome.css') }}">

    <style>
        /* Navbar overrides */
        .user-navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fff;
            padding: 14px 24px;
            border-radius: 14px;
            border: 1px solid #DED1C7;
            box-shadow: 0 2px 10px rgba(0,0,0,.04);
            margin-bottom: 30px;
        }
        .user-navbar .nav-logo img {
            height: 42px;
        }
        .user-navbar .nav-links-row {
            display: flex;
            align-items: center;
            gap: 22px;
        }
        .user-navbar .nav-links-row a {
            color: #4D0E13;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: color .2s;
        }
        .user-navbar .nav-links-row a:hover { color: #C8A49F; }
        .user-navbar .nav-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .user-navbar .profile-link {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #F8F1EA;
            color: #4D0E13;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            text-decoration: none;
            transition: .2s;
        }
        .user-navbar .profile-link:hover { background: #4D0E13; color: #fff; }
        .logout-form-inline { display: inline; }
        .logout-btn-nav {
            background: transparent;
            border: 1px solid #4D0E13;
            color: #4D0E13;
            padding: 7px 16px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: .2s;
        }
        .logout-btn-nav:hover { background: #4D0E13; color: #fff; }

        /* Alert */
        .page-alert {
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .page-alert.success { background: #E8F5E9; color: #256029; border-right: 4px solid #4CAF50; }
        .page-alert.error   { background: #FFEBEE; color: #C62828; border-right: 4px solid #f44336; }

        /* Welcome */
        .welcome-section {
            text-align: center;
            background: linear-gradient(135deg, #4D0E13, #7A252B);
            border-radius: 18px;
            padding: 36px 24px;
            margin-bottom: 30px;
            color: #fff;
        }
        .welcome-section h1 { font-size: 1.8rem; margin-bottom: 6px; }
        .welcome-section h1 span { color: #F8C8C0; }
        .welcome-section p { color: rgba(255,255,255,.75); font-size: 14px; }

        /* Cards */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 18px;
        }
        .home-card {
            background: #fff;
            border: 1px solid #DED1C7;
            border-radius: 16px;
            padding: 28px 20px;
            text-align: center;
            text-decoration: none;
            color: #3E2A2B;
            transition: transform .3s, box-shadow .3s, border-color .3s;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
        }
        .home-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(77,14,19,.1);
            border-color: #C8A49F;
        }
        .card-icon {
            width: 62px;
            height: 62px;
            background: #F8F1EA;
            border-radius: 50%;
            color: #4D0E13;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            transition: .3s;
        }
        .home-card:hover .card-icon { background: #4D0E13; color: #fff; }
        .home-card h3 { font-size: 1.05rem; color: #4D0E13; margin: 0; }
        .home-card p  { font-size: 12px; color: #806D6D; margin: 0; }

        /* Report card special */
        .home-card.report-card-link .card-icon { background: #FFF3F3; color: #C62828; }
        .home-card.report-card-link:hover .card-icon { background: #C62828; color: #fff; }
        .home-card.report-card-link h3 { color: #C62828; }

        @media(max-width:600px) {
            .user-navbar { flex-wrap: wrap; gap: 10px; }
            .user-navbar .nav-links-row { display: none; }
            .welcome-section h1 { font-size: 1.4rem; }
        }
    </style>
</head>

<body>

<div class="user-home-container">

    {{-- ========= NAVBAR ========= --}}
    <nav class="user-navbar">

        <a href="{{ route('home') }}" class="nav-logo">
            <img src="{{ asset('dashboard/assets/dashboard/final.png') }}" alt="رحلة كتاب">
        </a>

        <div class="nav-links-row">
            <a href="{{ route('home') }}">الرئيسية</a>
            <a href="{{ route('showbooks') }}">الكتب المتاحة</a>
            <a href="{{ route('search') }}">البحث</a>
            <a href="{{ route('reviews.index') }}">الآراء</a>
            <a href="{{ route('report.show') }}">تواصل معنا</a>
        </div>

        <div class="nav-actions">
            <a href="{{ route('user.profile', ['id' => auth()->id()]) }}" class="profile-link" title="حسابي">
                <i class="fa-solid fa-user"></i>
            </a>
            <form class="logout-form-inline" action="{{ route('auth.logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn-nav">تسجيل الخروج</button>
            </form>
        </div>

    </nav>

    {{-- ========= ALERTS ========= --}}
    @if(session('success'))
        <div class="page-alert success">
            <i class="fa-solid fa-circle-check" style="margin-left:6px;"></i>
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="page-alert error">
            <i class="fa-solid fa-circle-xmark" style="margin-left:6px;"></i>
            {{ session('error') }}
        </div>
    @endif

    {{-- ========= WELCOME ========= --}}
    <div class="welcome-section">
        <h1>أهلاً بك يا <span>{{ auth()->user()->name }}</span> 👋</h1>
        <p>ماذا تريد أن تفعل اليوم؟</p>
    </div>

    {{-- ========= CARDS ========= --}}
    <div class="cards-grid">

        <a href="{{ route('showbooks') }}" class="home-card">
            <div class="card-icon"><i class="fa-solid fa-book-open"></i></div>
            <h3>الكتب المعروضة</h3>
            <p>تصفح جميع الكتب المتاحة للتبادل</p>
        </a>

        <a href="{{ route('showmybooks', ['id' => auth()->id()]) }}" class="home-card">
            <div class="card-icon"><i class="fa-solid fa-book"></i></div>
            <h3>كتبي</h3>
            <p>إدارة الكتب التي عرضتها</p>
        </a>

        <a href="{{ route('addbook') }}" class="home-card">
            <div class="card-icon"><i class="fa-solid fa-plus"></i></div>
            <h3>إضافة كتاب</h3>
            <p>شارك كتابًا مع مجتمع القراء</p>
        </a>

        <a href="{{ route('reviews.index') }}" class="home-card">
            <div class="card-icon"><i class="fa-solid fa-comments"></i></div>
            <h3>الآراء</h3>
            <p>اقرأ وشارك آراء القراء</p>
        </a>

        <a href="{{ route('search') }}" class="home-card">
            <div class="card-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
            <h3>البحث</h3>
            <p>ابحث عن كتاب بالاسم أو النوع</p>
        </a>

        <a href="{{ route('user.profile', ['id' => auth()->id()]) }}" class="home-card">
            <div class="card-icon"><i class="fa-solid fa-circle-user"></i></div>
            <h3>حسابي</h3>
            <p>عرض وتعديل بياناتك الشخصية</p>
        </a>

        <a href="{{ route('report.show') }}" class="home-card report-card-link">
            <div class="card-icon"><i class="fa-solid fa-triangle-exclamation"></i></div>
            <h3>الإبلاغ عن مشكلة</h3>
            <p>تواصل مع الإدارة لحل أي مشكلة</p>
        </a>

    </div>

</div>

</body>
</html>
