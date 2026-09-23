<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/CSS/showmybooks.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/CSS/show.css') }}">
    <title>Document</title>
    <style>

</style>
</head>
<body>
<header class="books-navbar">
    <a href="{{ route('user.showbooks') }}" class="logo">
        <img src="{{ asset('storage/images/final.png') }}" alt="رحلة كتاب">
    </a>

    <nav class="nav-links">
        <a href="{{ url('/') }}">الرئيسية</a>
        <a href="{{ route('user.showbooks') }}">الكتب المتاحة</a>
        <a href="{{ route('user.profile', ['id' => auth()->id()]) }}">حسابي</a>
        <a href="{{ route('user.showmybooks', ['id' => auth()->id()]) }}" class="active">كتبي</a>
        <a href="{{ route('user.addbook') }}">إضافة كتاب</a>
    </nav>

    <div class="auth-buttons">
        <a href="{{ route('auth.logout') }}" class="login-btn">تسجيل الخروج</a>
    </div>
</header>

<div class="container py-4">
    <h2>كتبي الخاصة</h2>
    <hr>

    <div class="row">
@if ($mybooks->count() == 0)
    <div class="alert alert-info text-center">
        لم تقم بإضافة أي كتب بعد.
    </div>
        <a href="{{ route('user.addbook') }}">إضافة الكتاب</a>
@else
    @foreach($mybooks as $book)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('storage/' . $book->image) }}"
                     class="card-img-top"
                     alt="{{ $book->title }}"
                     style=" object-fit: cover;">

                <div class="card-body">
                    <h5 class="card-title">{{ $book->title }}</h5>
                </div>

                <div class="card-footer bg-transparent d-flex justify-content-between">
                    
                    <form action="{{ route('deletebook', $book->id) }}"
                          method="POST"
                          onsubmit="return confirm('هل أنت متأكد من حذف هذا الكتاب؟')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            حذف
                        </button>
                    </form>
                    <a href="{{ route('editbook', $book->id) }}"
                       class="btn  btn-warning">تعديل</a>
                    <a href="{{ route('accept', $book->id) }}" class="btn btn-secondary">
                        تم طلب الكتاب
                    </a>
                </div>
            </div>
        </div>
    @endforeach
@endif
    </div>
</div>
</body>
</html>