{{-- <!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f1e8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .form-container {
            background: white;
            width: 400px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 6px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 11px;
            border: none;
            border-radius: 6px;
            background: #65735b;
            color: white;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.9;
        }
    </style>
</head>

<body>
    @if ($errors->any())
                    
                
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                  
                <li>{{$error}}</li>

            @endforeach
        </div>
        @endif

        @if (Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
                    
        @endif

    <div class="form-container">

        <h2>تعديل بيانات الكتاب</h2>

        <form action="{{route('admin.books.update',$book->id)}}" method="POST">
            @csrf
            @method('put')

            <label for="name">العنوان</label>
            <input type="text" id="name" name="name" value="{{$book['title']}}">

            <label for="type">النوع</label>
            <input type="text" id="type" name="type" value="{{$book['type']}}">

            <label for="status">حالة الكتاب</label>
            <input type="text" id="status" name="status" value="{{$book['status']}}">

            <label for="state">الحالة</label>
            <input type="text" id="state" name="state" value="{{$book['state']}}">

            <button type="submit">تعديل</button>

        </form>

    </div>

</body>
</html> --}}