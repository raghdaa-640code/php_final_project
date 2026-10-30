@extends('layouts.app')

@section('title', 'تقديم بلاغ')

@push('styles')
<style>
/* =========================
   Report Page
========================= */

.report-page-title {
    text-align: center;
    margin-bottom: 30px;
}

.report-page-title h1 {
    color: #4D0E13;
    font-size: 26px;
    font-weight: 700;
    margin-bottom: 6px;
}

.report-page-title p {
    color: #806D6D;
    font-size: 14px;
}

/* =========================
   Submit Card
========================= */

.report-form-card {
    background: #FFFFFF;
    border: 1px solid rgba(77, 14, 19, 0.12);
    border-radius: 16px;
    padding: 28px;
    margin-bottom: 30px;
    box-shadow: 0 6px 20px rgba(77, 14, 19, 0.06);
}

.report-form-card label {
    display: block;
    margin-bottom: 8px;
    color: #4D0E13;
    font-size: 14px;
    font-weight: 600;
}

.report-form-card textarea {
    width: 100%;
    min-height: 130px;
    padding: 12px 14px;
    resize: vertical;
    border: 1px solid #D8CCC5;
    border-radius: 9px;
    background: #FCF9F6;
    color: #3E2A2B;
    font-family: Arial, sans-serif;
    font-size: 14px;
    line-height: 1.7;
    outline: none;
    transition: 0.25s;
    margin-bottom: 14px;
}

.report-form-card textarea:focus {
    border-color: #C8A49F;
    background: #FFFFFF;
    box-shadow: 0 0 0 3px rgba(200, 164, 159, 0.18);
}

.report-submit-btn {
    border: none;
    background: #4D0E13;
    color: #FFFFFF;
    padding: 11px 32px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.25s;
}

.report-submit-btn:hover {
    background: #351014;
    transform: translateY(-1px);
    box-shadow: 0 5px 12px rgba(77, 14, 19, 0.18);
}

/* =========================
   Login notice
========================= */

.login-notice {
    background: #FCF9F6;
    border: 1px solid rgba(77, 14, 19, 0.12);
    border-radius: 12px;
    padding: 20px 24px;
    margin-bottom: 30px;
    color: #806D6D;
    font-size: 15px;
    text-align: center;
}

.login-notice a {
    color: #4D0E13;
    font-weight: 600;
    text-decoration: none;
}

.login-notice a:hover {
    text-decoration: underline;
}

/* =========================
   My Reports List
========================= */

.section-title {
    color: #4D0E13;
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 16px;
    padding-bottom: 8px;
    border-bottom: 2px solid #C8A49F;
}

.report-card {
    background: #FFFFFF;
    border: 1px solid rgba(77, 14, 19, 0.10);
    border-radius: 14px;
    padding: 20px;
    margin-bottom: 16px;
    box-shadow: 0 4px 14px rgba(77, 14, 19, 0.05);
}

.report-card .report-text {
    background: #F8F1EA;
    border-right: 4px solid #C8A49F;
    border-radius: 10px;
    padding: 14px 16px;
    color: #3E2A2B;
    font-size: 14px;
    line-height: 1.8;
    margin-bottom: 14px;
}

.report-card .admin-reply {
    background: #EEF4FF;
    border-right: 4px solid #2271d1;
    border-radius: 10px;
    padding: 12px 16px;
    color: #1A3A6B;
    font-size: 13px;
    line-height: 1.7;
    margin-bottom: 10px;
}

.report-card .admin-reply strong {
    display: block;
    margin-bottom: 5px;
    font-size: 12px;
    color: #2271d1;
}

.report-meta {
    font-size: 12px;
    color: #999;
    margin-bottom: 10px;
}

.report-actions {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.btn-delete-report {
    border: none;
    background: #7A252B;
    color: #fff;
    padding: 8px 16px;
    border-radius: 7px;
    font-size: 13px;
    cursor: pointer;
    transition: 0.2s;
}

.btn-delete-report:hover {
    background: #5A171C;
}

.empty-reports {
    text-align: center;
    color: #999;
    font-size: 14px;
    padding: 20px 0;
}

@media (max-width: 600px) {
    .report-form-card { padding: 18px; }
    .report-submit-btn { width: 100%; }
    .report-actions { flex-direction: column; }
    .btn-delete-report { width: 100%; }
}
</style>
@endpush

@section('content')

<div class="report-page-title">
    <h1>📢 تقديم بلاغ أو شكوى</h1>
    <p>هنا يمكنك التواصل معنا أو الإبلاغ عن أي مشكلة تواجهها في المنصة.</p>
</div>

{{-- ==================== FORM ==================== --}}
@auth
    <div class="report-form-card">
        <form method="POST" action="{{ route('report.submit') }}">
            @csrf
            <label for="report">محتوى البلاغ</label>
            <textarea
                id="report"
                name="report"
                placeholder="اكتب شكواك أو بلاغك هنا..."
                required
            >{{ old('report') }}</textarea>

            <button type="submit" class="report-submit-btn">
                <i class="fa-solid fa-paper-plane" style="margin-left:6px;"></i>
                إرسال البلاغ
            </button>
        </form>
    </div>

    {{-- ==================== MY REPORTS ==================== --}}
    @if($myReports->isNotEmpty())
        <h2 class="section-title">بلاغاتي السابقة</h2>

        @foreach($myReports as $rep)
            <div class="report-card">
                <div class="report-meta">
                    <i class="fa-regular fa-calendar" style="margin-left:4px;"></i>
                    {{ $rep->created_at->diffForHumans() }}
                </div>

                <div class="report-text">{{ $rep->report }}</div>

                @if($rep->admin_reply)
                    <div class="admin-reply">
                        <strong>رد الإدارة:</strong>
                        {{ $rep->admin_reply }}
                    </div>
                @else
                    <p class="muted" style="font-size:13px; margin-bottom:10px;">⏳ لم يتم الرد بعد...</p>
                @endif

                <div class="report-actions">
                    <form method="POST" action="{{ route('report.delete', $rep->id) }}"
                          onsubmit="return confirm('هل تريد حذف هذا البلاغ؟')">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn-delete-report">
                            <i class="fa-solid fa-trash" style="margin-left:4px;"></i>
                            حذف
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    @else
        <div class="empty-reports">
            <i class="fa-regular fa-folder-open" style="font-size:32px; margin-bottom:8px; display:block;"></i>
            لا توجد بلاغات سابقة.
        </div>
    @endif

@else
    <div class="login-notice">
        <i class="fa-solid fa-circle-info" style="margin-left:6px; color:#4D0E13;"></i>
        لتقديم بلاغ، يجب <a href="{{ route('auth.login') }}">تسجيل الدخول</a> أولاً.
    </div>
@endauth

@endsection
