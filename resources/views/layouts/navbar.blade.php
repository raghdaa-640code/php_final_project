<header class="navbar">
    <div class="nav-container">

        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('dashboard/assets/dashboard/final.png') }}" alt="رحلة كتاب">
        </a>

        <nav class="nav-links">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
                الرئيسية
            </a>

            <a href="{{route('report.show')}}">تواصل معنا</a>
            <a href="{{route('reviews.index')}}">مراجعات القراء</a>
            <a href="{{route('showbooks')}}">الكتب المتاحة</a>

            {{-- لو المستخدم مسجل دخول، بنتحقق من الـ role --}}
            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.users.dashboard') }}" class="{{ request()->routeIs('admin.users.dashboard') ? 'active' : '' }}">
                        لوحة التحكم
                    </a>
                    <a href="#">البلاغات</a>
                @else
                    <a href="{{ route('user.userhome') }}" class="{{ request()->routeIs('user.userhome') ? 'active' : '' }}">
                        الصفحة الشخصية
                    </a>
                @endif
            @endauth
        </nav>

        <div class="nav-actions">
            @guest
                {{-- @if(!Route::is('auth.login') || !Route::is('auth.regester') ) --}}
                    <a href="{{ route('auth.login') }}" class="login-btn">
                         تسجيل الدخول
                    </a>

                    <a href="{{ route('auth.register') }}" class="register-btn">
                         إنشاء حساب
                    </a>
                {{-- @endif --}}
            @else
                {{-- زرار تسجيل الخروج يظهر فقط إذا كان مسجل دخول ومش في (الرئيسية، اللوجن، التسجيل) --}}
                @unless(request()->routeIs('home') || request()->routeIs('auth.login') || request()->routeIs('auth.register'))
                    {{-- <form action="{{ route('auth.logout') }}" method="GET" style="display: inline;">
                        @csrf
                        <button type="submit" class="login-btn" style="border: 1px solid var(--burgundy); cursor: pointer;">
                            تسجيل الخروج
                        </button>
                    </form> --}}

                    <nav>
                        @auth
                            <a href="{{ route('auth.logout') }}" class="logout-btn">تسجيل الخروج</a>
                        @endauth
                    </nav>

                   <div class="container">
                        @yield('content')
                   </div>
                @endunless
            @endguest

            <button class="menu-btn">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>

    </div>
</header>