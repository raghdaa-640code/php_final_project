<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>

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

        <h2>Add User</h2>

        <form action="{{route('admin.users.store')}}" method="POST">
            @csrf

            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">

            <label for="password">Password</label>
            <input type="password" id="password" name="password" value="{{ old('password') }}">

            <label for="phone">phone</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone') }}">

            <label for="location">location</label>
            <input type="text" id="location" name="location" value="{{ old('location') }}">

            <button type="submit">Add User</button>

        </form>

    </div>

</body>
</html>