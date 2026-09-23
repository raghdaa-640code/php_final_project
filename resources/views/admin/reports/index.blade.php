@extends('layouts.app')

@section('title', 'بلاغات المستخدمين')

@push('styles')
<style>
/* =========================
   Reports Page
========================= */

.card {
    background: #FFFFFF;
    border: 1px solid rgba(77, 14, 19, 0.12);
    border-radius: 16px;
    padding: 24px;
    margin-bottom: 20px;

    box-shadow: 0 6px 20px rgba(77, 14, 19, 0.06);
}


/* =========================
   Page Title
========================= */

.card h1 {
    margin: 0;

    color: #4D0E13;

    font-size: 25px;
    font-weight: 700;
}


/* =========================
   User
========================= */

.user-row {
    display: flex;
    align-items: center;
    gap: 12px;

    margin-bottom: 18px;
}

.user-row strong {
    color: #3E2A2B;
    font-size: 16px;
}


/* =========================
   Avatar
========================= */

.avatar,
.avatar-placeholder {
    width: 45px;
    height: 45px;

    border-radius: 50%;

    flex-shrink: 0;
}

.avatar {
    object-fit: cover;
}


.avatar-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;

    background: #C8A49F;

    color: #4D0E13;

    font-size: 18px;
    font-weight: 700;
}


/* =========================
   Report Text
========================= */

.report-text {
    background: #F8F1EA;

    border-right: 4px solid #C8A49F;

    border-radius: 10px;

    padding: 15px 16px;

    color: #3E2A2B;

    font-size: 14px;

    line-height: 1.8;

    margin-bottom: 20px;
}


/* =========================
   Admin Reply Box
========================= */

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

    font-size: 14px;
    font-weight: 600;
}


.admin-box textarea {
    width: 100%;

    min-height: 100px;

    padding: 12px 14px;

    resize: vertical;

    border: 1px solid #D8CCC5;

    border-radius: 9px;

    background: #FFFFFF;

    color: #3E2A2B;

    font-family: Arial, sans-serif;

    font-size: 14px;

    line-height: 1.7;

    outline: none;

    transition: 0.25s;

    margin-bottom: 12px;
}


.admin-box textarea:focus {
    border-color: #C8A49F;

    box-shadow:
        0 0 0 3px rgba(200, 164, 159, 0.18);
}


/* =========================
   Reply Button
========================= */

.admin-box button {
    border: none;

    background: #4D0E13;

    color: #FFFFFF;

    padding: 10px 22px;

    border-radius: 8px;

    font-size: 14px;

    font-weight: 600;

    cursor: pointer;

    transition: 0.25s;
}


.admin-box button:hover {
    background: #351014;

    transform: translateY(-1px);

    box-shadow:
        0 5px 12px rgba(77, 14, 19, 0.16);
}


/* =========================
   Empty Reports
========================= */

.card p {
    color: #806D6D;

    margin: 0;

    font-size: 15px;
}


/* =========================
   Responsive
========================= */

@media (max-width: 600px) {

    .card {
        padding: 18px;
        border-radius: 13px;
    }

    .card h1 {
        font-size: 21px;
    }

    .report-text {
        padding: 13px;
    }

    .admin-box {
        padding: 15px;
    }

    .admin-box button {
        width: 100%;
    }
}
</style>
@endpush

@section('content')
    <div class="card">
        <h1>بلاغات المستخدمين</h1>
        <p class="muted">هذه الصفحة خاصة بالمسؤول فقط.</p>
    </div>

    @forelse($reports as $report)
        <div class="card">
            <div class="user-row">
                @if($report->user && $report->user->image)
                    <img class="avatar" src="{{ asset('storage/' . $report->user->image) }}" alt="صورة المستخدم">
                @else
                    <div class="avatar-placeholder">
                        {{ $report->user ? mb_substr($report->user->name, 0, 1) : '?' }}
                    </div>
                @endif

                <strong>{{ $report->user->name ?? 'مستخدم محذوف' }}</strong>
            </div>

            <div class="report-text">{{ $report->report }}</div>

            <div class="admin-box">
                <form method="POST" action="{{ route('admin.reports.reply', $report) }}">
                    @csrf
                    @method('PUT')

                    <label for="admin_reply_{{ $report->id }}">الرد</label>
                    <textarea id="admin_reply_{{ $report->id }}" name="admin_reply" required>{{ old('admin_reply', $report->admin_reply) }}</textarea>

                    <button type="submit">
                        {{ $report->admin_reply ? 'تعديل الرد' : 'رد' }}
                    </button>
                </form>
            </div>
        </div>
    @empty
        <div class="card">
            <p>لا توجد بلاغات.</p>
        </div>
    @endforelse
@endsection
