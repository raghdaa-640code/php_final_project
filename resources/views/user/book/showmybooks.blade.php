<div class="container py-4">
    <h2>كتبي الخاصة</h2>
    <hr>

    <div class="row">
        @foreach($myBooks as $book)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('storage/' . $book->id . '.jpg') }}" class="card-img-top" alt="{{ $book->title }}" style="height: 250px; object-fit: cover;">
                    
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        
                    </div>
                    <div class="card-footer bg-transparent d-flex justify-content-between">
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-warning">تعديل</a>

                        <form action="{{ route('books.delete', $book->id) }}" method="POST" onsubmit="return confirm('هل أنت تأكد من حذف هذا الكتاب؟')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    لم تقم بإضافة أي كتب بعد.
                </div>
            </div>
        @endforeach
    </div>
</div>