@extends('layouts.app')

@section('title', 'Admin Dashboard')
@section('page-title', 'Admin Dashboard')
@section('breadcrumb', 'Dashboard')

@section('content')

<!-- Stats Grid -->
<div class="stat-grid">
    <div class="stat-card">
        <div class="stat-icon purple"><i class="fas fa-user-graduate"></i></div>
        <div class="stat-info">
            <h3>{{ $stats['students'] }}</h3>
            <p>Total Students</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon green"><i class="fas fa-chalkboard-teacher"></i></div>
        <div class="stat-info">
            <h3>{{ $stats['lecturers'] }}</h3>
            <p>Lecturers</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon blue"><i class="fas fa-book-open"></i></div>
        <div class="stat-info">
            <h3>{{ $stats['courses'] }}</h3>
            <p>Courses</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon orange"><i class="fas fa-clipboard-list"></i></div>
        <div class="stat-info">
            <h3>{{ $stats['registrations'] }}</h3>
            <p>Registrations</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon cyan"><i class="fas fa-users"></i></div>
        <div class="stat-info">
            <h3>{{ $stats['users'] }}</h3>
            <p>Total Users</p>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="card mb-20" style="margin-bottom:24px;">
    <div class="card-header">
        <span class="card-title"><i class="fas fa-th-large" style="color:#2d5a4e;"></i> Quick Actions</span>
    </div>
    <div class="card-body">
        <div style="display:flex;gap:12px;flex-wrap:wrap;">
            <a href="{{ route('students.create') }}" class="btn btn-primary">
                <i class="fas fa-user-plus"></i> Add Student
            </a>
            <a href="{{ route('lecturers.create') }}" class="btn btn-success">
                <i class="fas fa-user-tie"></i> Add Lecturer
            </a>
            <a href="{{ route('courses.create') }}" class="btn btn-warning" style="color:white;">
                <i class="fas fa-plus-circle"></i> Add Course
            </a>
            <a href="{{ route('announcements.create') }}" class="btn btn-outline">
                <i class="fas fa-bullhorn"></i> New Announcement
            </a>
            <a href="{{ route('events.create') }}" class="btn btn-secondary">
                <i class="fas fa-calendar-plus"></i> New Event
            </a>
        </div>
    </div>
</div>

<!-- Main Grid -->
<div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;">

    <!-- Recent Students -->
    <div class="card">
        <div class="card-header">
            <span class="card-title"><i class="fas fa-user-graduate" style="color:#2d5a4e;"></i> Recent Students</span>
            <a href="{{ route('students.index') }}" class="btn btn-sm btn-outline">View All</a>
        </div>
        <div class="card-body" style="padding:0;">
            @forelse($recentStudents as $student)
            <div style="display:flex;align-items:center;gap:12px;padding:13px 20px;border-bottom:1px solid #f1f5f9;">
                <img src="{{ $student->avatar_url }}" alt="{{ $student->full_name }}"
                    style="width:38px;height:38px;border-radius:10px;object-fit:cover;">
                <div style="flex:1;min-width:0;">
                    <div style="font-weight:600;font-size:13.5px;color:#1e293b;">{{ $student->full_name }}</div>
                    <div style="font-size:12px;color:#94a3b8;">{{ $student->student_number }}</div>
                </div>
                <span class="badge {{ $student->status === 'active' ? 'badge-success' : 'badge-gray' }}">
                    {{ ucfirst($student->status) }}
                </span>
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-user-graduate"></i>
                <p>No students yet</p>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Recent Courses -->
    <div class="card">
        <div class="card-header">
            <span class="card-title"><i class="fas fa-book-open" style="color:#2563eb;"></i> Recent Courses</span>
            <a href="{{ route('courses.index') }}" class="btn btn-sm btn-outline">View All</a>
        </div>
        <div class="card-body" style="padding:0;">
            @forelse($recentCourses as $course)
            <div style="padding:13px 20px;border-bottom:1px solid #f1f5f9;">
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:4px;">
                    <div style="font-weight:600;font-size:13.5px;color:#1e293b;">{{ $course->name }}</div>
                    <span class="badge badge-info">{{ $course->course_code }}</span>
                </div>
                <div style="font-size:12px;color:#94a3b8;">
                    <i class="fas fa-chalkboard-teacher"></i>
                    {{ $course->lecturer?->full_name ?? 'Unassigned' }}
                    &bull;
                    {{ $course->enrolled_count }}/{{ $course->max_students }} enrolled
                </div>
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-book-open"></i>
                <p>No courses yet</p>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Announcements -->
    <div class="card">
        <div class="card-header">
            <span class="card-title"><i class="fas fa-bullhorn" style="color:#ef4444;"></i> Latest Announcements</span>
            <a href="{{ route('announcements.index') }}" class="btn btn-sm btn-outline">View All</a>
        </div>
        <div class="card-body" style="padding:0;">
            @forelse($announcements as $ann)
            <div style="padding:14px 20px;border-bottom:1px solid #f1f5f9;">
                <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:8px;">
                    <div style="font-weight:600;font-size:13.5px;color:#1e293b;">{{ $ann->title }}</div>
                    <span class="badge {{ $ann->audience === 'all' ? 'badge-info' : ($ann->audience === 'students' ? 'badge-purple' : 'badge-success') }}" style="white-space:nowrap;flex-shrink:0;">
                        {{ ucfirst($ann->audience) }}
                    </span>
                </div>
                <div style="font-size:12px;color:#94a3b8;margin-top:4px;">
                    {{ $ann->created_at->diffForHumans() }}
                </div>
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-bullhorn"></i>
                <p>No announcements yet</p>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Upcoming Events -->
    <div class="card">
        <div class="card-header">
            <span class="card-title"><i class="fas fa-calendar-alt" style="color:#2d5a4e;"></i> Upcoming Events</span>
            <a href="{{ route('events.index') }}" class="btn btn-sm btn-outline">View All</a>
        </div>
        <div class="card-body" style="padding:0;">
            @forelse($events as $event)
            <div style="padding:14px 20px;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;gap:14px;">
                <div style="text-align:center;min-width:46px;background:#e8f5ef;border-radius:10px;padding:8px 6px;">
                    <div style="font-size:18px;font-weight:800;color:#2d5a4e;line-height:1;">{{ $event->event_date->format('d') }}</div>
                    <div style="font-size:10px;color:#2d5a4e;font-weight:600;">{{ $event->event_date->format('M') }}</div>
                </div>
                <div>
                    <div style="font-weight:600;font-size:13.5px;color:#1e293b;">{{ $event->title }}</div>
                    <div style="font-size:12px;color:#94a3b8;">
                        <i class="fas fa-map-marker-alt"></i> {{ $event->location ?? 'TBD' }}
                    </div>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-calendar-alt"></i>
                <p>No upcoming events</p>
            </div>
            @endforelse
        </div>
    </div>

</div>

@endsection
