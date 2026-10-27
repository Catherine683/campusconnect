@extends('layouts.app')

@section('title', 'Register for Course')
@section('page-title', 'Register for Course')
@section('breadcrumb', 'Registrations / Register')

@section('content')
<div class="card" style="max-width:750px;">
    <div class="card-header">
        <span class="card-title"><i class="fas fa-clipboard-list" style="color:#f59e0b;"></i> Available Courses</span>
        <a href="{{ route('registrations.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
    </div>
    <div class="card-body" style="padding:0;">
        @forelse($courses as $course)
        <div style="padding:18px 20px;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;gap:16px;">
            <div style="width:48px;height:48px;background:linear-gradient(135deg,#1e40af,#3b82f6);border-radius:12px;display:flex;align-items:center;justify-content:center;color:white;font-size:18px;flex-shrink:0;">
                <i class="fas fa-book"></i>
            </div>
            <div style="flex:1;">
                <div style="font-weight:700;font-size:14px;color:#1e293b;margin-bottom:4px;">{{ $course->name }}</div>
                <div style="font-size:12.5px;color:#64748b;display:flex;flex-wrap:wrap;gap:12px;">
                    <span><i class="fas fa-tag"></i> {{ $course->course_code }}</span>
                    <span><i class="fas fa-star"></i> {{ $course->credit_units }} CU</span>
                    <span><i class="fas fa-chalkboard-teacher"></i> {{ $course->lecturer?->full_name ?? 'TBD' }}</span>
                    <span><i class="fas fa-users"></i> {{ $course->enrolled_count }}/{{ $course->max_students }}</span>
                    <span><i class="fas fa-calendar"></i> Year {{ $course->year_level }}, Sem {{ $course->semester }}</span>
                </div>
            </div>
            <div>
                @if($course->enrolled_count >= $course->max_students)
                <span class="badge badge-danger">Full</span>
                @else
                <form method="POST" action="{{ route('registrations.store') }}">
                    @csrf
                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Register
                    </button>
                </form>
                @endif
            </div>
        </div>
        @empty
        <div class="empty-state">
            <i class="fas fa-check-circle" style="color:#10b981;font-size:48px;margin-bottom:14px;display:block;"></i>
            <h4>All caught up!</h4>
            <p>You have registered for all available courses, or no courses are currently available.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
