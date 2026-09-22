@extends('layouts.app')

@section('title', 'بلاغات المستخدمين')

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
