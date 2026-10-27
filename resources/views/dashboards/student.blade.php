@extends('layouts.app')

@section('title', 'Student Dashboard')
@section('page-title', 'Student Dashboard')
@section('breadcrumb', 'Dashboard')

@section('content')

<!-- Welcome Banner -->
<div style="background:linear-gradient(135deg,#1e4034,#2d5a4e);border-radius:16px;padding:28px 32px;margin-bottom:28px;color:#f5f0e8;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:16px;">
    <div>
        <h2 style="font-size:22px;font-weight:800;margin-bottom:6px;font-family:'Poppins',sans-serif;">Good day, {{ $student?->first_name ?? auth()->user()->name }}!</h2>
        <p style="color:rgba(245,240,232,.7);font-size:14px;">
            {{ $student?->program ?? 'Program not set' }} &bull; Year {{ $student?->year_of_study ?? '—' }} &bull; {{ $student?->student_number ?? 'N/A' }}
        </p>
    </div>
    <div style="text-align:right;">
        <div style="font-size:28px;font-weight:800;">{{ $registrations?->count() ?? 0 }}</div>
        <div style="font-size:13px;color:rgba(245,240,232,.7);">Courses Registered</div>
    </div>
</div>

<!-- Stats -->
<div class="stat-grid" style="grid-template-columns:repeat(3,1fr);margin-bottom:28px;">
    <div class="stat-card">
        <div class="stat-icon purple"><i class="fas fa-clipboard-list"></i></div>
        <div class="stat-info">
            <h3>{{ $registrations?->count() ?? 0 }}</h3>
            <p>My Registrations</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon blue"><i class="fas fa-book-open"></i></div>
        <div class="stat-info">
            <h3>{{ $availableCourses?->count() ?? 0 }}</h3>
            <p>Available Courses</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon green"><i class="fas fa-award"></i></div>
        <div class="stat-info">
            <h3>{{ $registrations ? $registrations->sum(fn($r) => $r->course->credit_units ?? 0) : 0 }}</h3>
            <p>Credit Units</p>
        </div>
    </div>
</div>

<div style="display:grid;grid-template-columns:1.2fr 1fr;gap:24px;">

    <!-- My Registered Courses -->
    <div class="card">
        <div class="card-header">
            <span class="card-title"><i class="fas fa-clipboard-check" style="color:#7c3aed;"></i> My Registered Courses</span>
            <a href="{{ route('registrations.create') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus"></i> Register Course
            </a>
        </div>
        <div class="card-body" style="padding:0;">
            @forelse($registrations ?? [] as $reg)
            <div style="padding:14px 20px;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;gap:14px;">
                <div style="width:42px;height:42px;background:linear-gradient(135deg,#2d5a4e,#3d7a6a);border-radius:11px;display:flex;align-items:center;justify-content:center;color:#f5f0e8;font-size:16px;flex-shrink:0;">
                    <i class="fas fa-book-open"></i>
                </div>
                <div style="flex:1;min-width:0;">
                    <div style="font-weight:600;font-size:13.5px;color:#1e293b;">{{ $reg->course->name }}</div>
                    <div style="font-size:12px;color:#94a3b8;">
                        {{ $reg->course->course_code }} &bull;
                        {{ $reg->course->lecturer?->full_name ?? 'TBD' }}
                    </div>
                </div>
                <div style="display:flex;align-items:center;gap:8px;">
                    <span class="badge badge-success">{{ $reg->course->credit_units }} CU</span>
                    <form method="POST" action="{{ route('registrations.destroy', $reg) }}" onsubmit="return confirm('Drop this course?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-xs btn-danger">Drop</button>
                    </form>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-clipboard-list"></i>
                <h4>No registrations yet</h4>
                <p>Browse and register for available courses.</p>
                <a href="{{ route('registrations.create') }}" class="btn btn-primary" style="margin-top:14px;">
                    <i class="fas fa-plus"></i> Register Now
                </a>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Available Courses -->
    <div class="card">
        <div class="card-header">
            <span class="card-title"><i class="fas fa-book-open" style="color:#2563eb;"></i> Available Courses</span>
            <a href="{{ route('courses.index') }}" class="btn btn-sm btn-outline">Browse All</a>
        </div>
        <div class="card-body" style="padding:0;">
            @forelse($availableCourses ?? [] as $course)
            <div style="padding:13px 20px;border-bottom:1px solid #f1f5f9;">
                <div style="display:flex;align-items:center;justify-content:space-between;gap:8px;">
                    <div>
                        <div style="font-weight:600;font-size:13px;color:#1e293b;">{{ Str::limit($course->name, 35) }}</div>
                        <div style="font-size:11.5px;color:#94a3b8;">{{ $course->course_code }} &bull; {{ $course->enrolled_count }}/{{ $course->max_students }}</div>
                    </div>
                    <form method="POST" action="{{ route('registrations.store') }}" style="flex-shrink:0;">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <button type="submit" class="btn btn-xs btn-primary"
                            {{ $course->enrolled_count >= $course->max_students ? 'disabled' : '' }}>
                            {{ $course->enrolled_count >= $course->max_students ? 'Full' : 'Register' }}
                        </button>
                    </form>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-check-circle" style="color:#10b981;"></i>
                <h4>All done!</h4>
                <p>You're registered for all available courses.</p>
            </div>
            @endforelse
        </div>
    </div>

</div>

@endsection
