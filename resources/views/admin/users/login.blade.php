@extends('layouts.app')

@section('title', 'تسجيل الدخول')

@section('content')
    <div class="card" style="max-width:500px;margin:40px auto;">
        <h1>تسجيل الدخول</h1>

        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            <label for="email">البريد الإلكتروني</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>

            <label for="password">كلمة المرور</label>
            <input id="password" type="password" name="password" required>

            <button type="submit">تسجيل الدخول</button>
        </form>
    </div>
@endsection
