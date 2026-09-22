@extends('layouts.app')

@section('title', 'بلاغاتي')

@section('content')
    <div class="card">
        <h1>بلاغاتي</h1>
        <p class="muted">هنا تظهر البلاغات التي قمت بإرسالها ورد المسؤول عليها.</p>
    </div>

    @forelse($reports as $report)
        <div class="card">
            <h3>البلاغ</h3>
            <div class="report-text">{{ $report->report }}</div>

            @if($report->admin_reply)
                <div class="reply">
                    <strong>رد المسؤول:</strong>
                    <div class="report-text">{{ $report->admin_reply }}</div>
                </div>
            @else
                <div class="reply" style="background:#fafafa;border-right-color:#999;">
                    لم يتم الرد على البلاغ حتى الآن.
                </div>
            @endif
        </div>
    @empty
        <div class="card">
            <p>لا توجد بلاغات خاصة بك.</p>
        </div>
    @endforelse
@endsection
