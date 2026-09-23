<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        :root {
            --cream: #EEE4DA;
            --cream-light: #F8F2EC;
            --burgundy: #4D0E13;
            --dark-burgundy: #3A080C;
            --text: #3E2A2B;
            --muted: #806D6D;
            --border: #DED1C7;
            --white: #FFFFFF;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--cream);
            color: var(--text);
            font-family: Tahoma, Arial, sans-serif;
        }

        .form-container {
            width: min(92%, 560px);
            margin: 45px auto;
            background: var(--cream-light);
            padding: 30px;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: 0 5px 18px rgba(77, 14, 19, 0.08);
            direction: rtl;
            text-align: right;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            font-weight: 600;
            color: var(--burgundy);
            font-size: 14px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            height: 43px;
            padding: 10px 12px;
            border: 1px solid var(--border);
            border-radius: 8px;
            color: var(--text);
            background: var(--white);
            font: inherit;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: var(--burgundy);
            box-shadow: 0 0 0 3px rgba(77, 14, 19, 0.12);
            outline: none;
        }

        .form-group input[type="file"] {
            padding: 8px 10px;
            background: var(--cream-light);
        }

        .form-container form > a {
            display: block;
            width: 145px;
            margin: 28px auto 0;
            background: var(--burgundy);
            color: var(--white);
            padding: 10px 16px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
        }

        .form-container form > a:hover {
            background: var(--dark-burgundy);
        }

        .error .alert-danger {
            margin-bottom: 20px;
            padding: 12px 16px;
            color: var(--burgundy);
            background: #F7DADA;
            border: 1px solid #D9A5A5;
            border-right: 4px solid var(--burgundy);
            border-radius: 8px;
        }

        .error .alert-danger li {
            margin-bottom: 4px;
        }

        .error .alert-danger li:last-child {
            margin-bottom: 0;
        }

        @media (max-width: 576px) {
            .form-container {
                width: 94%;
                padding: 22px;
                margin: 25px auto;
            }
        }

        .submit-btn {
            width: 100%;
            background-color: var(--burgundy);
            color: var(--white);
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: var(--dark-burgundy);
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

            <a href="{{route('user.addbook')}}">إضافة الكتاب</a>
        </form>
    </div>

</body>

</html>