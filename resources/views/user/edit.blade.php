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
            --dusty-pink: #C8A49F;
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

        .main {
            width: min(92%, 650px);
            margin: 45px auto;
            direction: rtl;
        }

        .main .edit-card {
            overflow: hidden;
            background: var(--cream-light);
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: 0 5px 18px rgba(77, 14, 19, 0.08);
        }

        .main .edit-alert-danger {
            background: #F7DADA;
            border: 1px solid #D9A5A5;
            border-right: 4px solid var(--burgundy);
            color: var(--burgundy);
            padding: 12px 16px;
            margin: 20px 20px 0;
            border-radius: 8px;
        }

        .main .edit-alert-danger ul {
            margin: 0;
            padding-right: 20px;
        }

        .main .edit-alert-danger li {
            font-size: 13px;
            margin-bottom: 4px;
        }

        .main .edit-alert-danger li:last-child {
            margin-bottom: 0;
        }

        .main .edit-body {
            padding: 28px;
        }

        .main .edit-group {
            margin-bottom: 20px;
        }

        .main .edit-label {
            font-weight: 600;
            color: var(--burgundy);
            font-size: 14px;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
        }

        .main .edit-row {
            display: block;
        }

        .main .edit-field {
            width: 100%;
        }

        .main .edit-control {
            width: 100%;
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 10px 12px;
            font-size: 14px;
            color: var(--text);
            background: var(--white);
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .main .edit-control:focus {
            border-color: var(--burgundy);
            box-shadow: 0 0 0 3px rgba(77, 14, 19, 0.12);
            outline: none;
        }

        .main .edit-control[type="file"] {
            height: 43px;
            padding: 8px 10px;
            background: var(--cream-light);
        }

        .main .edit-form > div.edit-group:first-of-type {
            padding: 0;
            margin: 32px 28px 0;
            margin-bottom: 0;
        }

        .main .edit-form > div.edit-group:first-of-type .edit-label {
            margin-bottom: 10px;
        }

        .main .edit-actions {
            border-top: 1px solid var(--border);
            background: transparent;
        }

        .main .edit-actions .edit-body {
            padding: 16px 28px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .main .edit-button {
            background: var(--burgundy);
            border: 0;
            padding: 10px 34px;
            min-width: 145px;
            color: var(--white);
            font-weight: 600;
            border-radius: 8px;
            transition: background-color 0.2s ease;
        }

        .main .edit-button:hover {
            background: var(--dark-burgundy);
        }

        @media (max-width: 576px) {
            .main {
                width: 94%;
                margin: 25px auto;
            }

            .main .edit-body {
                padding: 20px;
            }

            .main .edit-actions .edit-body {
                padding: 14px 20px;
            }
        }
    </style>
</head>

<body>

    <div class="main">

        <div class="edit-card">
            @if($errors->any())
            <div class="edit-alert edit-alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="form-body">
                <form class="edit-form" action="{{route('user.updateuser',$user->id)}}" enctype="multipart/form-data" method="post" novalidate>
                    @csrf
                    @method('put')
                    <div class="edit-group edit-row">
                        <label for="image" class="edit-label">الصورة</label>
                        <div class="edit-field">
                            <input type="file" class="edit-control" id="image" name="image" value="" />
                        </div>
                    </div>
                    <div class="edit-body">
                        <div class="edit-group edit-row">
                            <label for="name" class="edit-label">اسم المستخدم</label>
                            <div class="edit-field">
                                <input type="text" class="edit-control" id="title" placeholder="Name Here"
                                    name="name" value="{{$user->name}}" />
                            </div>
                        </div>

                        <div class="edit-group edit-row">
                            <label for="type" class="edit-label">البريد الإلكتروني</label>
                            <div class="edit-field">
                                <input type="email" class="edit-control" id="email" placeholder="Email Here"
                                    name="email" value="{{$user->email}}" />
                            </div>
                        </div>
                        <div class="edit-group edit-row">
                            <label for="status" class="edit-label">رقم الهاتف</label>
                            <div class="edit-field">
                                <input type="text" class="edit-control" id="status" placeholder="Phone Here"
                                    name="phone" value="{{$user->phone}}" />
                            </div>
                        </div>

                            <div class="edit-group edit-row">
                                <label for="status" class="edit-label">الموقع </label>
                                <div class="edit-field">
                                    <input type="text" class="edit-control" id="location" placeholder="Location Here"
                                        name="location" value="{{$user->location}}" />
                                </div>
                            </div>
                            <div class="edit-actions">
                                <div class="edit-body">
                                    <button type="submit" class="edit-button">
                                        تعديل
                                    </button>
                                </div>
                            </div>
                </form>
            </div>
        </div>

    </div>

</body>

</html>