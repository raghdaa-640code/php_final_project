<header class="navbar">
    <div class="nav-container">

        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('dashboard/assets/dashboard/final.png') }}" alt="رحلة كتاب">
        </a>

        <nav class="nav-links">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
                الرئيسية
            </a>

            <a href="{{ route('report.show') }}">تواصل معنا</a>
            <a href="{{ route('reviews.index') }}">مراجعات القراء</a>
            <a href="{{ route('showbooks') }}">الكتب المتاحة</a>
            <a href="{{ route('search') }}">البحث</a>

            {{-- لو المستخدم مسجل دخول، بنتحقق من الـ role --}}
            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.home') }}" class="{{ request()->routeIs('admin.home') ? 'active' : '' }}">
                        الرئيسية الإدارية
                    </a>
                    <a href="{{ route('admin.users.dashboard') }}" class="{{ request()->routeIs('admin.users.dashboard') ? 'active' : '' }}">
                        لوحة التحكم
                    </a>
                    <a href="{{ route('admin.reports.index') }}">البلاغات</a>
                @else
                    <a href="{{ route('user.userhome') }}" class="{{ request()->routeIs('user.userhome') ? 'active' : '' }}">
                        الصفحة الشخصية
                    </a>
                @endif
            @endauth
        </nav>

        <div class="nav-actions">
            @guest
                <a href="{{ route('auth.login') }}" class="login-btn">
                    تسجيل الدخول
                </a>
                <a href="{{ route('auth.register') }}" class="register-btn">
                    إنشاء حساب
                </a>
            @else
                <form action="{{ route('auth.logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="login-btn" style="border: 1px solid var(--burgundy); cursor: pointer; background: transparent; color: var(--burgundy);">
                        تسجيل الخروج
                    </button>
                </form>
            @endguest

            <button class="menu-btn">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>

    </div>
</header>
