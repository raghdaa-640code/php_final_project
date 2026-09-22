<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container py-4">
    <h2>كتبي الخاصة</h2>
    <hr>

    <div class="row">
@if ($myBooks->count() == 0)
    <div class="alert alert-info text-center">
        لم تقم بإضافة أي كتب بعد.
    </div>
@else
    @foreach($myBooks as $book)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('storage/' . $book->image) }}"
                     class="card-img-top"
                     alt="{{ $book->title }}"
                     style="height: 250px; object-fit: cover;">

                <div class="card-body">
                    <h5 class="card-title">{{ $book->title }}</h5>
                </div>

                <div class="card-footer bg-transparent d-flex justify-content-between">
                    <a href="{{ route('books.editbook', $book->id) }}"
                       class="btn btn-sm btn-warning">تعديل</a>

                    <form action="{{ route('books.deletebook', $book->id) }}"
                          method="POST"
                          onsubmit="return confirm('هل أنت متأكد من حذف هذا الكتاب؟')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            حذف
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endif
    </div>
</div>
</body>
</html>