<!DOCTYPE html>
<html lang="ar" dir='rtl'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            box-sizing:border-box;
        }
        .container{
            display:flex;
            flex-wrap:wrap;
            text-align:center;
            justify-content:space-around;
            align-items:center;
            gap:20px;
        }

        .card{
            width:250px;
            height:365px;
            display:flex;
            text-align:center;
            justify-content:space-around;
            flex-direction:column;
            align-items:center;
            gap:7px;
            border: 1px solid black;
            border-radius:20px;
        }
        .card p , h3{
            margin:0;
        }
        img{
            width: 150px;
            height:200px;
            margin:2px;
        }
    </style>
</head>
<body>
    <div class="container">
    @foreach ($otherbooks as $book)
        <div class="card">
            <div class="img"><img src="{{asset('storage/'.$book->image)}}" alt=""></div>
            <h3>{{$book->title}}</h3>
            <p>{{$book->user->name}}</p>
            <p>{{$book->type}}</p>
            <p>{{$book->status}}</p>
            <p>{{$book->user->location}}</p>
        </div>
    @endforeach
    </div>
</body>
</html>