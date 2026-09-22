<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .form-container {
            max-width: 450px;
            margin: 40px auto;
            background: #ffffff;
            padding: 25px;
            border: 1px solid #ddd;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            direction: rtl;
            text-align: right;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 4px 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
        }

        .submit-btn {
            width: 100%;
            background-color: #2563eb;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #1d4ed8;
        }
    </style>

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

            <a href="{{route('book.addbook')}}">إضافة الكتاب</button>
        </form>
    </div>

</body>

</html>