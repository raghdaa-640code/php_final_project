<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
    <style>

.main {
    width: 550px;
    margin: 3rem auto;
    padding: 0 1rem;
    direction: rtl;
}

.main .card {
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    border: 1px solid #eef2f6;
}


.main .alert-danger {
    background-color: #fef2f2;
    border: none;
    border-right: 4px solid #ef4444;
    color: #991b1b;
    padding: 1rem 1.25rem;
    margin: 1.5rem 1.5rem 0 1.5rem;
    border-radius: 8px;
}

.main .alert-danger ul {
    margin: 0;
    padding-right: 1.25rem;
}

.main .alert-danger li {
    font-size: 0.9rem;
    margin-bottom: 0.25rem;
}

.main .alert-danger li:last-child {
    margin-bottom: 0;
}


.main .card-body {
    padding: 1.75rem;
}

.main .form-group {
    margin-bottom: 1.25rem;
    align-items: center;
}

.main .form-label {
    font-weight: 600;
    color: #374151;
    font-size: 0.95rem;
    margin-bottom: 0;          
    display: flex;
    align-items: center;
}


.main .form-control {
    border: 1.5px solid #e5e7eb;
    border-radius: 8px;
    padding: 0.65rem 1rem;
    font-size: 0.95rem;
    color: #1f2937;
    transition: all 0.2s ease-in-out;
}

.main .form-control:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
    outline: none;
}

.main .form-control[type="file"] {
    padding: 0.5rem;
    background-color: #f9fafb;
}


.main .border-top {
    border-top: 1px solid #f3f4f6 !important;
    background-color: #fafafa;
}

.main .border-top .card-body {
    padding: 1rem 1.75rem;
    display: flex;
    justify-content:space-around;
    align-items:center;
}

.main .btn-primary {
    background-color: #3b82f6;
    border-color: #3b82f6;
    padding: 0.6rem 2rem;
    font-weight: 600;
    border-radius: 8px;
    transition: background-color 0.2s ease;
}

.main .btn-primary:hover {
    background-color: #2563eb;
    border-color: #2563eb;
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
                                    name="title" value="{{$book->title}}"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="form-label">النوع</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="email" placeholder="Type Here"
                                    name="type" value="{{$book->type}}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="form-label">الحالة</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="status" placeholder="Status Here"
                                    name="status" value="{{$book->status}}"/>
                            </div>
                        </div>
                            <div class="form-group row">
                            <label for="image" class="form-label">الصورة</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="image" name="image" value=""/>
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