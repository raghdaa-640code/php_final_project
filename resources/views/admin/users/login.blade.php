<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>

    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/style.css') }}">
</head>
<body>

    <div class="login-card">
        <h2>تسجيل الدخول</h2>

        {{-- عرض رسائل الجلسة العامة إن وجدت --}}
        @if (session('error'))
            <div class="alert-session">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.users.login') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email">البريد الإلكتروني</label>
                <input 
                    type="text" 
                    id="email" 
                    name="email" 
                    class="form-control" 
                    placeholder="example@domain.com"
                    value="{{ old('email') }}"
                >
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">كلمة المرور</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="form-control" 
                    placeholder="أدخل كلمة المرور"
                >
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn-submit">دخول</button>
        </form>

        <div class="register-link">
            <span>ليس لديك حساب؟</span>
            <a href="{{ route('create') }}">إنشاء حساب</a>
        </div>
    </div>

</body>
</html>