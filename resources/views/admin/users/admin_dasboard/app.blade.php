<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Swopply | Admin Dashboard</title>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet" href="{{asset('dashboard/assets/dashboard/style.css')}}">
</head>

<body>

    <!-- Sidebar -->
    <aside class="sidebar">

        <div class="logo">
            <i class="fa-solid fa-book-open"></i>
            <span>Swopply</span>
        </div>

        <nav>

            <a href="#" class="active">
                <i class="fa-solid fa-house"></i>
                لوحة التحكم
            </a>

            <a href="#users">
                <i class="fa-solid fa-users"></i>
                المستخدمون
            </a>

            <a href="#books">
                <i class="fa-solid fa-book"></i>
                الكتب
            </a>

            <a href="#">
                <i class="fa-solid fa-right-left"></i>
                طلبات التبادل
            </a>

            <a href="#">
                <i class="fa-solid fa-chart-column"></i>
                التقارير
            </a>

            <a href="#">
                <i class="fa-solid fa-comments"></i>
                الاراء
            </a>
            <a href="#">
                <i class="fa-solid fa-flag"></i>
                البلاغات
            </a>
            <a href="#">
                <i class="fa-solid fa-gear"></i>
                الإعدادات
            </a>

        </nav>

        <div class="sidebar-bottom">
            <i class="fa-solid fa-book-open"></i>
            <p>معًا... لكتب أكثر قيمة</p>
        </div>

    </aside>


    <!-- Main -->
    <main class="main">

        <!-- Header -->
        <header>

            <div>
                <h1>لوحة التحكم</h1>
                <p>مرحبًا بك مجددًا 👋</p>
            </div>

            <div class="admin">

                <div class="admin-info">
                    <strong>مرحبًا، المدير</strong>
                    <small>admin@swopply.com</small>
                </div>

                <div class="avatar">
                    <i class="fa-solid fa-user"></i>
                </div>

                <i class="fa-regular fa-bell notification"></i>

            </div>

        </header>


        <!-- Statistics -->
        <section class="stats">

            <div class="stat-card">

                <div class="stat-icon">
                    <i class="fa-solid fa-users"></i>
                </div>

                <div>
                    <span>إجمالي المستخدمين</span>
                    <h2>{{$usersCount}}</h2>
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon">
                    <i class="fa-solid fa-book"></i>
                </div>

                <div>
                    <span>إجمالي الكتب</span>
                    <h2>{{$booksCount}}</h2>
                </div>

            </div>
            
            
            <div class="stat-card">
                
                <div class="stat-icon">
                    <i class="fa-solid fa-book-open"></i>
                </div>
                
                <div>
                    <span>الكتب المتاحة</span>
                    <h2>{{$availableBooks}}</h2>
                </div>
                
            </div>

            <div class="stat-card">

                <div class="stat-icon">
                    <i class="fa-solid fa-right-left"></i>
                </div>

                <div>
                    <span>الكتب الغير متاحة</span>
                    <h2>{{$unavailableBooks}}</h2>
                </div>

            </div>

        </section>


        <!-- Content -->
        <section class="content">

            <div class="tables">


                <!-- Users -->
                <div class="panel" id="users">

                    <div class="panel-header">

                        <h2>
                            <i class="fa-solid fa-users"></i>
                            إدارة المستخدمين
                        </h2>

                        <a href="{{route('admin.users.create')}}" class="add-btn">
                            <i class="fa-solid fa-plus"></i>
                            إضافة مستخدم
                        </a>

                    </div>


                    <div class="table-container">

                        <table>

                            <thead>
                                <tr>
                                    <th>الاسم</th>
                                    <th>البريد الإلكتروني</th>
                                    <th>الهاتف</th>
                                    <th>المكان</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                    
                                <tr>
                                    <td>{{$user['name']}}</td>
                                    <td>{{$user['email']}}</td>
                                    <td>
                                        {{$user['phone']}}
                                    </td>
                                    <td>{{$user['location']}}</td>
                                    
                                    <td>
                                        <button class="edit-btn">
                                        <i class="fa-solid fa-pen"></i>
                                        تعديل
                                    </button>

                                    <form action="{{route('admin.users.destroy',$user['id'])}}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('delete')
                                        <button class="delete-btn">
                                        <i class="fa-solid fa-trash"></i>
                                        حذف
                                        </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>


                <!-- Books -->
                <div class="panel" id="books">

                    <div class="panel-header">

                        <h2>
                            <i class="fa-solid fa-book"></i>
                            إدارة الكتب
                        </h2>


                    </div>


                    <div class="table-container">

                        <table>

                            <thead>

                                <tr>
                                    <th>العنوان</th>
                                    <th>المالك</th>
                                    <th>التصنيف</th>
                                    <th>حالة الكتاب</th>
                                    <th>الحالة</th>
                                    <th>الإجراءات</th>
                                </tr>

                            </thead>


                            <tbody>
                                @foreach ($books as $book)
                                    
                                <tr>
                                    <td>{{$book['title']}}</td>
                                    <td>{{$book->user->name}}</td>
                                    <td>{{$book['type']}}</td>
                                    <td>{{$book['status']}}</td>
                                    
                                    <td>
                                        @if ($book['state']=='متاح')
                                            
                                        <span class="status active-status">
                                            متاح
                                        </span>
                                        @else
                                        <span class="status pending-status">
                                            غير متاح
                                        </span>
                                        
                                        @endif
                                       
                                    </td>
                                    
                                    <td>
                                        
                                        <button class="edit-btn"
                                        onclick="editBook('Atomic Habits')">
                                        <i class="fa-solid fa-pen"></i>
                                        تعديل
                                    </button>
                                    
                                    <form action="{{route('admin.books.destroy',$book['id'])}}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('delete')
                                        <button class="delete-btn">
                                        <i class="fa-solid fa-trash"></i>
                                        حذف
                                        </button>
                                </form>
                                
                            </td>
                        </tr>
                        @endforeach
                            </tbody>

                        </table>

                    </div>

                </div>

            </div>


            </div>

        </section>

    </main>


    <script src="{{asset('dashboard/assets/dashboard/script.js')}}"></script>

</body>

</html>