<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
    <style>
        :root {
            --cream: #EEE4DA;
            --cream-light: #F8F2EC;
            --sand: #D8C4AC;
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

        .main .card {
            background: var(--cream-light);
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: 0 5px 18px rgba(77, 14, 19, 0.08);
        }

        .main .alert-danger {
            background: #F7DADA;
            border: 1px solid #D9A5A5;
            border-right: 4px solid var(--burgundy);
            color: var(--burgundy);
            padding: 12px 16px;
            margin: 20px 20px 0;
            border-radius: 8px;
        }

        .main .alert-danger ul {
            margin: 0;
            padding-right: 20px;
        }

        .main .alert-danger li {
            font-size: 13px;
            margin-bottom: 4px;
        }

        .main .card-body {
            padding: 28px;
        }

        .main .form-group {
            margin-bottom: 20px;
            align-items: center;
        }

        .main .form-label {
            font-weight: 600;
            color: var(--burgundy);
            font-size: 14px;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
        }

        .main .form-control {
            width: 100%;
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 10px 12px;
            font-size: 14px;
            color: var(--text);
            background: var(--white);
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .main .form-control:focus {
            border-color: var(--burgundy);
            box-shadow: 0 0 0 3px rgba(77, 14, 19, 0.12);
            outline: none;
        }

        .main .form-control[type="file"] {
            padding: 8px;
            background: var(--cream-light);
        }

        .main .border-top {
            border-top: 1px solid var(--border) !important;
            background: var(--cream);
        }

        .main .border-top .card-body {
            padding: 16px 28px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .main .btn-primary {
            background-color: var(--burgundy);
            border-color: var(--burgundy);
            padding: 10px 34px;
            color: var(--white);
            font-weight: 600;
            border-radius: 8px;
            transition: background-color 0.2s ease;
        }

        .main .btn-primary:hover {
            background-color: var(--dark-burgundy);
            border-color: var(--dark-burgundy);
        }

        @media (max-width: 576px) {
            .main {
                width: 94%;
                margin: 25px auto;
            }

            .main .card-body {
                padding: 20px;
            }

            .main .border-top .card-body {
                padding: 14px 20px;
            }
        }
    </style>
</head>

<body>

    <div class="main">

        <div class="card">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="form-body">
                <form class="form-horizontal" action="{{route('user.updatebook',$book->id)}}" enctype="multipart/form-data" method="post" novalidate>
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="form-label">عنوان الكتاب</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title" placeholder="Title Here"
                                    name="title" value="{{$book->title}}" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="form-label">النوع</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="email" placeholder="Type Here"
                                    name="type" value="{{$book->type}}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="form-label">الحالة</label>
                            <div class="col-sm-9">
                                <select name="status" id="status" class="form-control">
                                    <option value="مستعمل" @if ($book->status == 'مستعمل') selected @endif>
                                        مستعمل
                                    </option>

                                    <option value="جديد" @if ($book->status == 'جديد') selected @endif>
                                        جديد
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="form-label">الصورة</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="image" name="image" value="" />
                            </div>
                        </div>

                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">
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