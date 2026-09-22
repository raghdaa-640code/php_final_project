<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب</title>
    <link rel="stylesheet" href="{{ asset('dashboard/assets/CSS/register.css') }}">
</head>
<body>

    <div class="register-container">
        <h2>إنشاء حساب</h2>

        <form action="{{ route('handleregister') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">الاسم</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">البريد الإلكتروني</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">كلمة المرور</label>
                <input type="password" id="password" name="password">
                @error('password')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">رقم الهاتف</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}">
                @error('phone')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="location">الموقع</label>
                <input type="text" id="location" name="location" value="{{ old('location') }}">
                @error('location')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">الصورة الشخصية</label>
                <input type="file" id="image" name="image" accept="image/png, image/jpeg">
                @error('image')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="submit-btn">إنشاء حساب</button>
        </form>
    </div>

</body>
</html>