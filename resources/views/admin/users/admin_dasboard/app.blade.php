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
                    <h2>124</h2>
                    <small class="increase">↑ 12%</small>
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon">
                    <i class="fa-solid fa-book"></i>
                </div>

                <div>
                    <span>إجمالي الكتب</span>
                    <h2>318</h2>
                    <small class="increase">↑ 8%</small>
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon">
                    <i class="fa-solid fa-right-left"></i>
                </div>

                <div>
                    <span>طلبات التبادل</span>
                    <h2>76</h2>
                    <small class="increase">↑ 15%</small>
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon">
                    <i class="fa-solid fa-book-open"></i>
                </div>

                <div>
                    <span>الكتب المتاحة</span>
                    <h2>246</h2>
                    <small class="increase">↑ 10%</small>
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

                        <button class="add-btn" onclick="addUser()">
                            <i class="fa-solid fa-plus"></i>
                            إضافة مستخدم
                        </button>

                    </div>


                    <div class="table-container">

                        <table>

                            <thead>
                                <tr>
                                    <th>الاسم</th>
                                    <th>البريد الإلكتروني</th>
                                    <th>الصورة</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                    
                                <tr>
                                    <td>{{$user['name']}}</td>
                                    <td>{{$user['email']}}</td>
                                    <td>
                                        {{$user['image']}}
                                    </td>
                                    
                                    <td>
                                        <button class="edit-btn"
                                        onclick="editUser('سارة أحمد')">
                                        <i class="fa-solid fa-pen"></i>
                                        تعديل
                                    </button>
                                    
                                    <button class="delete-btn"
                                    onclick="deleteUser(this)">
                                    <i class="fa-solid fa-trash"></i>
                                    حذف
                                </button>
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

                        <button class="add-btn" onclick="addBook()">
                            <i class="fa-solid fa-plus"></i>
                            إضافة كتاب
                        </button>

                    </div>


                    <div class="table-container">

                        <table>

                            <thead>

                                <tr>
                                    <th>العنوان</th>
                                    <th>المالك</th>
                                    <th>التصنيف</th>
                                    <th>الحالة</th>
                                    <th>الإجراءات</th>
                                </tr>

                            </thead>


                            <tbody>

                                <tr>
                                    <td>Atomic Habits</td>
                                    <td>سارة أحمد</td>
                                    <td>تطوير الذات</td>

                                    <td>
                                        <span class="status active-status">
                                            متاح
                                        </span>
                                    </td>

                                    <td>

                                        <button class="edit-btn"
                                            onclick="editBook('Atomic Habits')">
                                            تعديل
                                        </button>

                                        <button class="delete-btn"
                                            onclick="deleteBook(this)">
                                            حذف
                                        </button>

                                    </td>
                                </tr>


                                <tr>
                                    <td>1984</td>
                                    <td>محمد علي</td>
                                    <td>روايات</td>

                                    <td>
                                        <span class="status active-status">
                                            متاح
                                        </span>
                                    </td>

                                    <td>

                                        <button class="edit-btn"
                                            onclick="editBook('1984')">
                                            تعديل
                                        </button>

                                        <button class="delete-btn"
                                            onclick="deleteBook(this)">
                                            حذف
                                        </button>

                                    </td>
                                </tr>


                                <tr>
                                    <td>Clean Code</td>
                                    <td>نورهان مصطفى</td>
                                    <td>برمجة</td>

                                    <td>
                                        <span class="status active-status">
                                            متاح
                                        </span>
                                    </td>

                                    <td>

                                        <button class="edit-btn"
                                            onclick="editBook('Clean Code')">
                                            تعديل
                                        </button>

                                        <button class="delete-btn"
                                            onclick="deleteBook(this)">
                                            حذف
                                        </button>

                                    </td>
                                </tr>


                                <tr>
                                    <td>The Martian</td>
                                    <td>علي حسن</td>
                                    <td>خيال علمي</td>

                                    <td>
                                        <span class="status pending-status">
                                            قيد التبادل
                                        </span>
                                    </td>

                                    <td>

                                        <button class="edit-btn"
                                            onclick="editBook('The Martian')">
                                            تعديل
                                        </button>

                                        <button class="delete-btn"
                                            onclick="deleteBook(this)">
                                            حذف
                                        </button>

                                    </td>
                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>


            <!-- Activities -->
            <div class="activities">

                <div class="panel">

                    <div class="panel-header">
                        <h2>
                            <i class="fa-regular fa-clock"></i>
                            أحدث الأنشطة
                        </h2>
                    </div>


                    <div class="activity">

                        <i class="fa-solid fa-right-left"></i>

                        <div>
                            <strong>طلب تبادل كتاب</strong>
                            <p>تم طلب كتاب 1984</p>
                            <small>منذ 10 دقائق</small>
                        </div>

                    </div>


                    <div class="activity">

                        <i class="fa-solid fa-book"></i>

                        <div>
                            <strong>إضافة كتاب جديد</strong>
                            <p>تمت إضافة Atomic Habits</p>
                            <small>منذ 25 دقيقة</small>
                        </div>

                    </div>


                    <div class="activity">

                        <i class="fa-solid fa-user"></i>

                        <div>
                            <strong>مستخدم جديد</strong>
                            <p>تم تسجيل مستخدم جديد</p>
                            <small>منذ ساعة</small>
                        </div>

                    </div>


                    <div class="activity">

                        <i class="fa-solid fa-right-left"></i>

                        <div>
                            <strong>قبول طلب تبادل</strong>
                            <p>تم قبول طلب تبادل كتاب</p>
                            <small>منذ ساعتين</small>
                        </div>

                    </div>

                </div>

            </div>

        </section>

    </main>


    <script src="{{asset('dashboard/assets/dashboard/script.js')}}"></script>

</body>

</html>