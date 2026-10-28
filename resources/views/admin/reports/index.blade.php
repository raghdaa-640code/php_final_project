<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>رحلة كتاب | البلاغات</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/dashboard/style.css') }}">

    <style>
    /* =========================
       Reports inside Admin Layout
    ========================= */

    .reports-content {
        padding: 10px 0;
    }

    .reports-header-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 24px;
    }

    .reports-header-bar h2 {
        color: #4D0E13;
        font-size: 20px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .reports-header-bar h2 i {
        color: #C8A49F;
    }

    /* Alert */
    .admin-alert-success {
        background: #E8F5E9;
        color: #256029;
        border-radius: 9px;
        padding: 12px 16px;
        margin-bottom: 20px;
        font-size: 14px;
        border-right: 4px solid #4CAF50;
    }

    /* Report Card */
    .report-card {
        background: #FFFFFF;
        border: 1px solid rgba(77, 14, 19, 0.10);
        border-radius: 14px;
        padding: 22px;
        margin-bottom: 18px;
        box-shadow: 0 4px 16px rgba(77, 14, 19, 0.05);
    }

    /* User Row */
    .user-row {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 16px;
    }

    .user-row strong {
        color: #3E2A2B;
        font-size: 15px;
    }

    .avatar,
    .avatar-placeholder {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .avatar { object-fit: cover; }

    .avatar-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        background: #C8A49F;
        color: #4D0E13;
        font-size: 17px;
        font-weight: 700;
    }

    /* Report Text */
    .report-text {
        background: #F8F1EA;
        border-right: 4px solid #C8A49F;
        border-radius: 10px;
        padding: 14px 16px;
        color: #3E2A2B;
        font-size: 14px;
        line-height: 1.8;
        margin-bottom: 18px;
    }

    /* Admin Reply Box */
    .admin-box {
        background: #FCF9F6;
        border: 1px solid rgba(77, 14, 19, 0.10);
        border-radius: 12px;
        padding: 18px;
    }

    .admin-box label {
        display: block;
        margin-bottom: 8px;
        color: #4D0E13;
        font-size: 13px;
        font-weight: 600;
    }

    .admin-box textarea {
        width: 100%;
        min-height: 95px;
        padding: 11px 13px;
        resize: vertical;
        border: 1px solid #D8CCC5;
        border-radius: 9px;
        background: #FFFFFF;
        color: #3E2A2B;
        font-family: Arial, sans-serif;
        font-size: 14px;
        line-height: 1.7;
        outline: none;
        transition: 0.2s;
        margin-bottom: 12px;
    }

    .admin-box textarea:focus {
        border-color: #C8A49F;
        box-shadow: 0 0 0 3px rgba(200, 164, 159, 0.18);
    }

    .admin-box button {
        border: none;
        background: #4D0E13;
        color: #FFFFFF;
        padding: 9px 22px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s;
    }

    .admin-box button:hover {
        background: #351014;
        transform: translateY(-1px);
        box-shadow: 0 4px 10px rgba(77, 14, 19, 0.15);
    }

    /* Empty State */
    .empty-card {
        background: #FFFFFF;
        border: 1px solid rgba(77, 14, 19, 0.08);
        border-radius: 14px;
        padding: 40px;
        text-align: center;
        color: #806D6D;
        font-size: 15px;
        box-shadow: 0 4px 16px rgba(77, 14, 19, 0.04);
    }

    .empty-card i {
        font-size: 38px;
        color: #C8A49F;
        display: block;
        margin-bottom: 12px;
    }

    @media (max-width: 600px) {
        .report-card { padding: 16px; }
        .admin-box { padding: 14px; }
        .admin-box button { width: 100%; }
    }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <aside class="sidebar">

        <div class="logo">
            <img src="{{ asset('dashboard/assets/dashboard/final.png') }}" alt="رحلة كتاب">
        </div>

        <nav>
            <a href="{{ route('admin.home') }}">
                <i class="fa-solid fa-house"></i>
                الرئيسية
            </a>

            <a href="{{ route('admin.users.dashboard') }}" class="sidebar-link" data-section="dashboard">
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

            <a href="{{ route('admin.reports.index') }}" class="active">
                <i class="fa-solid fa-flag"></i>
                البلاغات
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
                <h1>البلاغات</h1>
                <p>إدارة بلاغات وشكاوى المستخدمين 📋</p>
            </div>

            <div class="admin">
                <div class="admin-info">
                    <strong>مرحبًا، المدير</strong>
                </div>
                <div class="avatar-placeholder" style="width:38px;height:38px;border-radius:50%;background:#C8A49F;display:flex;align-items:center;justify-content:center;color:#4D0E13;font-weight:700;">
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>
        </header>


        <!-- Content -->
        <section class="content">
            <div class="reports-content">

                <div class="reports-header-bar">
                    <h2>
                        <i class="fa-solid fa-flag"></i>
                        بلاغات المستخدمين
                        @if($reports->isNotEmpty())
                            <span style="background:#4D0E13;color:#fff;font-size:12px;padding:2px 10px;border-radius:20px;">{{ $reports->count() }}</span>
                        @endif
                    </h2>
                </div>

                {{-- Success Message --}}
                @if(session('success'))
                    <div class="admin-alert-success">
                        <i class="fa-solid fa-check-circle" style="margin-left:6px;"></i>
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Reports --}}
                @forelse($reports as $report)
                    <div class="report-card">

                        <div class="user-row">
                            @if($report->user && $report->user->image)
                                <img class="avatar" src="{{ asset('storage/' . $report->user->image) }}" alt="صورة المستخدم">
                            @else
                                <div class="avatar-placeholder">
                                    {{ $report->user ? mb_substr($report->user->name, 0, 1) : '?' }}
                                </div>
                            @endif

                            <div>
                                <strong>{{ $report->user->name ?? 'مستخدم محذوف' }}</strong>
                                <div style="font-size:12px;color:#999;margin-top:2px;">
                                    <i class="fa-regular fa-clock" style="margin-left:3px;"></i>
                                    {{ $report->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>

                        <div class="report-text">{{ $report->report }}</div>

                        <div class="admin-box">
                            <form method="POST" action="{{ route('admin.reports.reply', $report) }}">
                                @csrf
                                @method('PUT')

                                <label for="admin_reply_{{ $report->id }}">
                                    <i class="fa-solid fa-reply" style="margin-left:5px;color:#C8A49F;"></i>
                                    {{ $report->admin_reply ? 'تعديل الرد' : 'رد على البلاغ' }}
                                </label>

                                <textarea
                                    id="admin_reply_{{ $report->id }}"
                                    name="admin_reply"
                                    placeholder="اكتب ردك هنا..."
                                    required
                                >{{ old('admin_reply', $report->admin_reply) }}</textarea>

                                <button type="submit">
                                    <i class="fa-solid fa-paper-plane" style="margin-left:5px;"></i>
                                    {{ $report->admin_reply ? 'تعديل الرد' : 'إرسال الرد' }}
                                </button>
                            </form>
                        </div>

                    </div>
                @empty
                    <div class="empty-card">
                        <i class="fa-regular fa-folder-open"></i>
                        لا توجد بلاغات حتى الآن.
                    </div>
                @endforelse

            </div>
        </section>

    </main>


    <script src="{{ asset('dashboard/assets/dashboard/script.js') }}"></script>

</body>

</html>
