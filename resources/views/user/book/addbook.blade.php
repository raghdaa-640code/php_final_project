<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/CSS/add.css') }}">
    <title>Document</title>

</head>

<body>
    <div class="form-container">
        <div class="error">
            @if($errors->any())   
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </div>
            @endif
        </div>
        <h2 style="text-align: center; margin-bottom: 20px; font-size: 22px;">إضافة كتاب</h2>

        <form action="{{ route('user.storebook') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>عنوان الكتاب</label>
                <input type="text" name="title" value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <label>التصنيف</label>
                <input type="text" name="type" value="{{ old('type') }}">
            </div>

            <div class="form-group">
                <label>حالة الكتاب</label>
                <select name="status">
                    <option value="مستعمل">مستعمل</option>
                    <option value="جديد">جديد</option>
                    
                </select>
            </div>

            <div class="form-group">
                <label>صورة الكتاب</label>
                <input type="file" name="image">
            </div>

            <a href="{{route('user.addbook')}}">إضافة الكتاب</a>
        </form>
    </div>

</body>

</html>