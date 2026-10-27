@extends('layouts.app')

@section('title', 'Lecturer Dashboard')
@section('page-title', 'Lecturer Dashboard')
@section('breadcrumb', 'Dashboard')

@section('content')

<!-- Welcome Banner -->
<div style="background:linear-gradient(135deg,#064e3b,#059669);border-radius:16px;padding:28px 32px;margin-bottom:28px;color:white;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:16px;">
    <div>
        <h2 style="font-size:22px;font-weight:800;margin-bottom:6px;">Welcome back, {{ $lecturer?->first_name ?? auth()->user()->name }}!</h2>
        <p style="color:rgba(255,255,255,.7);font-size:14px;">
            {{ $lecturer?->department ?? 'Department not set' }} &bull; Staff No: {{ $lecturer?->staff_number ?? 'N/A' }}
        </p>
    </div>
    <div style="text-align:right;">
        <div style="font-size:28px;font-weight:800;">{{ $courses?->count() ?? 0 }}</div>
        <div style="font-size:13px;color:rgba(255,255,255,.7);">Assigned Courses</div>
    </div>
</div>

<!-- Stats -->
<div class="stat-grid" style="grid-template-columns:repeat(3,1fr);">
    <div class="stat-card">
        <div class="stat-icon blue"><i class="fas fa-book-open"></i></div>
        <div class="stat-info">
            <h3>{{ $courses?->count() ?? 0 }}</h3>
            <p>My Courses</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon purple"><i class="fas fa-user-graduate"></i></div>
        <div class="stat-info">
            <h3>{{ $totalStudents }}</h3>
            <p>Total Students</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon green"><i class="fas fa-calendar"></i></div>
        <div class="stat-info">
            <h3>{{ date('Y') }}</h3>
            <p>Academic Year</p>
        </div>
    </div>
</div>

<!-- My Courses -->
<div class="card">
    <div class="card-header">
        <span class="card-title"><i class="fas fa-book-open" style="color:#2563eb;"></i> My Assigned Courses</span>
        <a href="{{ route('courses.index') }}" class="btn btn-sm btn-outline">View All</a>
    </div>
    <div class="card-body" style="padding:0;">
        @if($courses && $courses->count())
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Code</th>
                            <th>Year / Semester</th>
                            <th>Students</th>
                            <th>Capacity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                        <tr>
                            <td>
                                <div style="font-weight:600;color:#1e293b;">{{ $course->name }}</div>
                                <div style="font-size:12px;color:#94a3b8;">{{ $course->credit_units }} credit units</div>
                            </td>
                            <td><span class="badge badge-info">{{ $course->course_code }}</span></td>
                            <td>Year {{ $course->year_level }}, Sem {{ $course->semester }}</td>
                            <td>{{ $course->students_count }}</td>
                            <td>
                                <div style="background:#f1f5f9;border-radius:6px;height:8px;width:100px;">
                                    @php $pct = $course->max_students > 0 ? min(100, ($course->students_count / $course->max_students) * 100) : 0; @endphp
                                    <div style="background:{{ $pct >= 80 ? '#ef4444' : ($pct >= 60 ? '#f59e0b' : '#10b981') }};height:8px;border-radius:6px;width:{{ $pct }}%;"></div>
                                </div>
                                <div style="font-size:11px;color:#94a3b8;margin-top:3px;">{{ $course->students_count }}/{{ $course->max_students }}</div>
                            </td>
                            <td>
                                <a href="{{ route('courses.show', $course) }}" class="btn btn-xs btn-outline">
                                    <i class="fas fa-eye"></i> View
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-book-open"></i>
                <h4>No courses assigned</h4>
                <p>You have no courses assigned at this time.</p>
            </div>
        @endif
    </div>
</div>

@endsection
