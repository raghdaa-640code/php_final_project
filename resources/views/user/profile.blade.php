<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الملف الشخصي</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .profile-card {
            max-width: 600px;
            margin: 50px auto;
            border-radius: 15px;
        }

        .profile-image {
            width: 130px;
            height: 130px;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>
</head>
<body class="bg-light">

<!-- <?php  
// use Illuminate\Support\Facades\Auth;
// $user = Auth::user(); ?> -->

<div class="container">
    <div class="card profile-card shadow">
        <div class="card-body text-center">

            @if($user->image)
                <img src="{{ asset('storage/' . $user->image) }}"
                     class="profile-image mb-3"
                     alt="صورة المستخدم">
            @else
                <div class="mb-3">لا توجد صورة</div>
            @endif

            <h3>{{ $user->name }}</h3>
            <hr>

            <div class="text-end">
                <p>البريد الإلكتروني:{{ $user->email }}</p>
                <p>رقم الهاتف: {{ $user->phone }}</p>
                <p>الموقع: {{ $user->location }}</p>
                <p>
                    نوع الحساب:
                    {{ $user->is_admin }}
                </p>
            </div>

            <a href="{{ route('user.editprofile' , $user->id) }}" class="btn btn-primary mt-3">
                تعديل البيانات
            </a>
            <a href="{{ route('user.deleteuser', $user->id) }}" class="btn btn-danger mt-3">
                حذف الحساب
            </a>

        </div>
    </div>
</div>

</body>
</html>