<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>

    <style>
        :root {
    --cream: #EEE4DA;
    --sand: #D8C4AC;
    --dusty-pink: #C8A49F;
    --burgundy: #4D0E13;
    --dark-burgundy: #351014;
    --text: #3E2A2B;
    --muted: #806D6D;
    --white: #FFFFFF;
    --border: rgba(77, 14, 19, 0.12);
}

* {
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background: var(--cream);
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 30px;
}

/* Form */

.form-container {
    background: var(--white);
    width: 400px;
    padding: 30px;
    border-radius: 16px;
    border: 1px solid var(--border);

    box-shadow:
        0 8px 25px rgba(77, 14, 19, 0.08);
}

/* Title */

h2 {
    text-align: center;
    color: var(--burgundy);
    margin-bottom: 25px;
    font-size: 24px;
}

h2::after {
    content: "";
    display: block;
    width: 45px;
    height: 3px;
    background: var(--dusty-pink);
    border-radius: 10px;
    margin: 10px auto 0;
}

/* Labels */

label {
    display: block;
    margin-bottom: 6px;
    color: var(--text);
    font-size: 14px;
    font-weight: 600;
}

/* Inputs */

input {
    width: 100%;
    padding: 11px 12px;
    margin-bottom: 18px;

    border: 1px solid #D8CCC5;
    border-radius: 8px;

    background: #FCF9F6;
    color: var(--text);

    outline: none;
    transition: 0.25s;
}

input:focus {
    border-color: var(--dusty-pink);
    background: var(--white);

    box-shadow:
        0 0 0 3px rgba(200, 164, 159, 0.18);
}

/* Button */

button {
    width: 100%;
    padding: 12px;

    border: none;
    border-radius: 8px;

    background: var(--burgundy);
    color: var(--white);

    cursor: pointer;

    font-size: 15px;
    font-weight: 600;

    transition: 0.25s;
}

button:hover {
    background: var(--dark-burgundy);

    transform: translateY(-1px);

    box-shadow:
        0 5px 15px rgba(77, 14, 19, 0.18);
}

/* Alerts */

.alert {
    position: fixed;
    top: 25px;
    right: 25px;

    width: 320px;

    padding: 14px 18px;

    border-radius: 10px;

    font-size: 14px;

    box-shadow:
        0 5px 18px rgba(0, 0, 0, 0.08);
}

.alert-danger {
    background: #F8EAEA;
    color: var(--burgundy);

    border-right: 4px solid var(--burgundy);
}

.alert-danger li {
    list-style: none;
    margin-bottom: 5px;
}

.alert-success {
    background: #F1E8DE;
    color: var(--burgundy);

    border-right: 4px solid var(--dusty-pink);
}

/* Responsive */

@media (max-width: 500px) {

    body {
        padding: 20px;
    }

    .form-container {
        width: 100%;
        padding: 25px 20px;
    }

    .alert {
        top: 15px;
        right: 15px;
        left: 15px;
        width: auto;
    }
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

        <h2>إضافة مستخدم</h2>

        <form action="{{route('admin.users.store')}}" method="POST">
            @csrf

            <label for="name">الإسم</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">

            <label for="email">البريد الالكتروني</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">

            <label for="password">كلمة السر</label>
            <input type="password" id="password" name="password" value="{{ old('password') }}">

            <label for="phone">الهاتف</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone') }}">

            <label for="location">المكان</label>
            <input type="text" id="location" name="location" value="{{ old('location') }}">

            <button type="submit">إضافة</button>

        </form>

    </div>

</body>
</html>