@extends('layouts.app')
@section('content')
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

<div class="container">
    @foreach ($otherbooks as $book)
        <div class="card">
            <div class="img"><img src="{{asset('storage/'.$book->image)}}" alt="{{$book->title}}"></div>
            <h3>{{$book->title}}</h3>
            <p>{{$book->user->name}}</p>
            <p>{{$book->type}}</p>
            <p>{{$book->status}}</p>
            <p>{{$book->user->location}}</p>
            <p class='myphone' hidden>{{$book->user->phone}}</p>
        </div>
        <button type="button" class="btn btn-success" onclick="showphone(this)">
        اطلب الكتاب
        </button>
        @endforeach
    </div>

<script>
    function showphone(btn){
        const divContainer = btn.previousElementSibling;
        const myphone = divContainer.querySelector('.myphone');
        if(myphone){
            myphone.removeAttribute('hidden');
        };
    }
</script>
@endsection