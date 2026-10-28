<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>رحلة كتاب | الصفحة الرئيسية للإدارة</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/dashboard/style.css') }}">

    <style>
    /* =====================
       Admin Home Extra Styles
    ===================== */

    /* Quick Actions */
    .quick-actions {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: 14px;
        margin-bottom: 32px;
    }

    .quick-card {
        background: #FFFFFF;
        border: 1px solid rgba(77,14,19,.10);
        border-radius: 14px;
        padding: 20px 16px;
        text-align: center;
        text-decoration: none;
        color: #3E2A2B;
        transition: .25s;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        box-shadow: 0 3px 12px rgba(77,14,19,.04);
    }

    .quick-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 22px rgba(77,14,19,.10);
        border-color: #C8A49F;
    }

    .quick-card .qc-icon {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        background: #F8F1EA;
        color: #4D0E13;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        transition: .25s;
    }

    .quick-card:hover .qc-icon { background: #4D0E13; color: #fff; }

    .quick-card span {
        font-size: 13px;
        font-weight: 600;
        color: #4D0E13;
    }

    /* Section Title */
    .section-heading {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 16px;
        color: #4D0E13;
        font-size: 16px;
        font-weight: 700;
    }

    .section-heading i { color: #C8A49F; }

    /* Two Columns */
    .two-col {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 30px;
    }

    @media(max-width:780px) { .two-col { grid-template-columns: 1fr; } }

    /* Mini List Cards */
    .mini-list-card {
        background: #FFFFFF;
        border: 1px solid rgba(77,14,19,.10);
        border-radius: 14px;
        padding: 20px;
        box-shadow: 0 3px 12px rgba(77,14,19,.04);
    }

    .mini-list-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 11px 0;
        border-bottom: 1px solid #F0E6DC;
    }

    .mini-list-item:last-child { border-bottom: none; }

    .mini-avatar {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: #C8A49F;
        color: #4D0E13;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 15px;
        flex-shrink: 0;
    }

    .mini-list-item .item-info { flex: 1; }

    .mini-list-item .item-name {
        font-size: 14px;
        font-weight: 600;
        color: #3E2A2B;
        margin-bottom: 3px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 220px;
    }

    .mini-list-item .item-sub {
        font-size: 12px;
        color: #999;
    }

    .mini-list-item .item-badge {
        font-size: 11px;
        padding: 2px 8px;
        border-radius: 12px;
        font-weight: 600;
        white-space: nowrap;
        align-self: center;
    }

    .badge-pending { background: #FFF8E1; color: #B26A00; }
    .badge-replied { background: #E8F5E9; color: #256029; }
    .badge-available { background: #E8F5E9; color: #256029; }
    .badge-unavail  { background: #FFEBEE; color: #C62828; }

    .view-all-link {
        display: block;
        text-align: center;
        margin-top: 14px;
        font-size: 13px;
        color: #4D0E13;
        font-weight: 600;
        text-decoration: none;
        padding: 8px;
        border: 1px dashed #C8A49F;
        border-radius: 8px;
        transition: .2s;
    }

    .view-all-link:hover { background: #F8F1EA; }

    .empty-mini {
        text-align: center;
        padding: 24px 0;
        color: #C8A49F;
        font-size: 13px;
    }

    .empty-mini i { font-size: 28px; display: block; margin-bottom: 8px; }
    </style>
</head>

<body>

    <!-- ============ SIDEBAR ============ -->
    <aside class="sidebar">

        <div class="logo">
            <img src="{{ asset('dashboard/assets/dashboard/final.png') }}" alt="رحلة كتاب">
        </div>

        <nav>
            <a href="{{ route('admin.home') }}" class="active">
                <i class="fa-solid fa-house"></i>
                الرئيسية
            </a>

            <a href="{{ route('admin.users.dashboard') }}">
                <i class="fa-solid fa-table-columns"></i>
                لوحة التحكم
            </a>

            <a href="{{ route('home') }}">
                <i class="fa-solid fa-globe"></i>
                الموقع العام
            </a>

            <a href="{{ route('admin.users.dashboard') }}" class="sidebar-link" data-section="users">
                <i class="fa-solid fa-users"></i>
                المستخدمون
            </a>

            <a href="{{ route('admin.users.dashboard') }}" class="sidebar-link" data-section="books">
                <i class="fa-solid fa-book"></i>
                الكتب
            </a>

            <a href="{{ route('admin.reviews.index') }}">
                <i class="fa-solid fa-comments"></i>
                الآراء
            </a>

            <a href="{{ route('admin.reports.index') }}">
                <i class="fa-solid fa-flag"></i>
                البلاغات
            </a>
        </nav>

        <div class="sidebar-bottom">
            <i class="fa-solid fa-book-open"></i>
            <p>معًا... لكتب أكثر قيمة</p>
        </div>

    </aside>


    <!-- ============ MAIN ============ -->
    <main class="main">

        <!-- Header -->
        <header>
            <div>
                <h1>الصفحة الرئيسية</h1>
                <p>مرحبًا بك في لوحة إدارة رحلة كتاب 👋</p>
            </div>

            <div class="admin">
                <div class="admin-info">
                    <strong>{{ auth()->user()->name }}</strong>
                </div>
                <div class="avatar" style="width:38px;height:38px;border-radius:50%;background:#C8A49F;display:flex;align-items:center;justify-content:center;color:#4D0E13;font-weight:700;">
                    <i class="fa-solid fa-user-shield"></i>
                </div>
            </div>
        </header>


        <!-- ============ STATS ============ -->
        <section class="stats">

            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-users"></i></div>
                <div>
                    <span>إجمالي المستخدمين</span>
                    <h2>{{ $usersCount }}</h2>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-book"></i></div>
                <div>
                    <span>إجمالي الكتب</span>
                    <h2>{{ $booksCount }}</h2>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-book-open"></i></div>
                <div>
                    <span>الكتب المتاحة</span>
                    <h2>{{ $availableBooks }}</h2>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-flag"></i></div>
                <div>
                    <span>إجمالي البلاغات</span>
                    <h2>{{ $reportsCount }}</h2>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-comments"></i></div>
                <div>
                    <span>إجمالي الآراء</span>
                    <h2>{{ $reviewsCount }}</h2>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-right-left"></i></div>
                <div>
                    <span>الكتب غير المتاحة</span>
                    <h2>{{ $unavailableBooks }}</h2>
                </div>
            </div>

        </section>


        <!-- ============ QUICK ACTIONS ============ -->
        <section class="content">

            <div class="section-heading">
                <i class="fa-solid fa-bolt"></i>
                وصول سريع
            </div>

            <div class="quick-actions">

                <a href="{{ route('admin.users.dashboard') }}" class="quick-card">
                    <div class="qc-icon"><i class="fa-solid fa-table-columns"></i></div>
                    <span>لوحة التحكم</span>
                </a>

                <a href="{{ route('admin.users.create') }}" class="quick-card">
                    <div class="qc-icon"><i class="fa-solid fa-user-plus"></i></div>
                    <span>إضافة مستخدم</span>
                </a>

                <a href="{{ route('admin.reports.index') }}" class="quick-card">
                    <div class="qc-icon"><i class="fa-solid fa-flag"></i></div>
                    <span>البلاغات</span>
                </a>

                <a href="{{ route('admin.reviews.index') }}" class="quick-card">
                    <div class="qc-icon"><i class="fa-solid fa-comments"></i></div>
                    <span>الآراء</span>
                </a>

                <a href="{{ route('showbooks') }}" class="quick-card">
                    <div class="qc-icon"><i class="fa-solid fa-book-open"></i></div>
                    <span>الكتب المتاحة</span>
                </a>

                <a href="{{ route('home') }}" class="quick-card">
                    <div class="qc-icon"><i class="fa-solid fa-globe"></i></div>
                    <span>الموقع العام</span>
                </a>

            </div>


            <!-- ============ TWO COLUMNS ============ -->
            <div class="two-col">

                <!-- Latest Reports -->
                <div>
                    <div class="section-heading">
                        <i class="fa-solid fa-flag"></i>
                        آخر البلاغات
                    </div>

                    <div class="mini-list-card">
                        @forelse($recentReports as $rep)
                            <div class="mini-list-item">
                                <div class="mini-avatar">
                                    {{ $rep->user ? mb_substr($rep->user->name, 0, 1) : '?' }}
                                </div>
                                <div class="item-info">
                                    <div class="item-name">{{ $rep->user->name ?? 'مستخدم محذوف' }}</div>
                                    <div class="item-sub">{{ mb_substr($rep->report, 0, 45) }}...</div>
                                </div>
                                @if($rep->admin_reply)
                                    <span class="item-badge badge-replied">تم الرد</span>
                                @else
                                    <span class="item-badge badge-pending">بانتظار</span>
                                @endif
                            </div>
                        @empty
                            <div class="empty-mini">
                                <i class="fa-regular fa-folder-open"></i>
                                لا توجد بلاغات
                            </div>
                        @endforelse

                        <a href="{{ route('admin.reports.index') }}" class="view-all-link">
                            عرض جميع البلاغات <i class="fa-solid fa-arrow-left" style="margin-right:4px;"></i>
                        </a>
                    </div>
                </div>

                <!-- Latest Books -->
                <div>
                    <div class="section-heading">
                        <i class="fa-solid fa-book"></i>
                        آخر الكتب المضافة
                    </div>

                    <div class="mini-list-card">
                        @forelse($recentBooks as $book)
                            <div class="mini-list-item">
                                <div class="mini-avatar" style="background:#EEE4DA;color:#4D0E13;border-radius:8px;">
                                    <i class="fa-solid fa-book" style="font-size:14px;"></i>
                                </div>
                                <div class="item-info">
                                    <div class="item-name">{{ $book->title }}</div>
                                    <div class="item-sub">{{ $book->user->name ?? 'غير معروف' }} · {{ $book->type }}</div>
                                </div>
                                @if($book->state === 'متاح')
                                    <span class="item-badge badge-available">متاح</span>
                                @else
                                    <span class="item-badge badge-unavail">غير متاح</span>
                                @endif
                            </div>
                        @empty
                            <div class="empty-mini">
                                <i class="fa-regular fa-folder-open"></i>
                                لا توجد كتب
                            </div>
                        @endforelse

                        <a href="{{ route('admin.users.dashboard') }}" class="view-all-link">
                            عرض جميع الكتب <i class="fa-solid fa-arrow-left" style="margin-right:4px;"></i>
                        </a>
                    </div>
                </div>

            </div>

        </section>

    </main>

    <script src="{{ asset('dashboard/assets/dashboard/script.js') }}"></script>

</body>
</html>
