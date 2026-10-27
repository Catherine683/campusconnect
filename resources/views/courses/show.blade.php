@extends('layouts.app')

@section('title', $course->name)
@section('page-title', 'Course Details')
@section('breadcrumb', 'Courses / ' . $course->course_code)

@section('content')
<div style="display:grid;grid-template-columns:1fr 320px;gap:24px;align-items:start;">

    <!-- Main -->
    <div style="display:flex;flex-direction:column;gap:20px;">
        <div class="card">
            <div style="background:linear-gradient(135deg,#1e40af,#2563eb);padding:24px;border-radius:12px 12px 0 0;">
                <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;">
                    <div>
                        <span class="badge" style="background:rgba(255,255,255,.2);color:white;margin-bottom:8px;">{{ $course->course_code }}</span>
                        <h2 style="font-size:22px;font-weight:800;color:white;">{{ $course->name }}</h2>
                    </div>
                    <span class="badge {{ $course->status === 'active' ? 'badge-success' : 'badge-gray' }}">{{ ucfirst($course->status) }}</span>
                </div>
            </div>
            <div class="card-body">
                @if($course->description)
                <p style="color:#475569;line-height:1.7;margin-bottom:20px;">{{ $course->description }}</p>
                @endif

                <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:16px;">
                    <div style="text-align:center;background:#f8fafc;border-radius:10px;padding:14px;">
                        <div style="font-size:24px;font-weight:800;color:#2563eb;">{{ $course->credit_units }}</div>
                        <div style="font-size:11.5px;color:#94a3b8;">Credit Units</div>
                    </div>
                    <div style="text-align:center;background:#f8fafc;border-radius:10px;padding:14px;">
                        <div style="font-size:24px;font-weight:800;color:#7c3aed;">{{ $course->enrolled_count }}</div>
                        <div style="font-size:11.5px;color:#94a3b8;">Enrolled</div>
                    </div>
                    <div style="text-align:center;background:#f8fafc;border-radius:10px;padding:14px;">
                        <div style="font-size:24px;font-weight:800;color:#059669;">{{ $course->max_students }}</div>
                        <div style="font-size:11.5px;color:#94a3b8;">Capacity</div>
                    </div>
                    <div style="text-align:center;background:#f8fafc;border-radius:10px;padding:14px;">
                        <div style="font-size:24px;font-weight:800;color:#d97706;">{{ $course->year_level }}</div>
                        <div style="font-size:11.5px;color:#94a3b8;">Year Level</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Registered Students -->
        <div class="card">
            <div class="card-header">
                <span class="card-title"><i class="fas fa-user-graduate" style="color:#7c3aed;"></i> Registered Students ({{ $course->students->count() }})</span>
            </div>
            <div class="card-body" style="padding:0;">
                @forelse($course->students as $student)
                <div style="padding:13px 20px;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;gap:12px;">
                    <img src="{{ $student->avatar_url }}" alt="{{ $student->full_name }}"
                        style="width:36px;height:36px;border-radius:9px;object-fit:cover;">
                    <div style="flex:1;">
                        <div style="font-weight:600;font-size:13.5px;color:#1e293b;">{{ $student->full_name }}</div>
                        <div style="font-size:12px;color:#94a3b8;">{{ $student->student_number }}</div>
                    </div>
                    <span class="badge badge-success">{{ ucfirst($student->pivot->status) }}</span>
                </div>
                @empty
                <div class="empty-state">
                    <i class="fas fa-user-graduate"></i>
                    <p>No students registered yet</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div style="display:flex;flex-direction:column;gap:16px;">
        <div class="card">
            <div class="card-header">
                <span class="card-title">Course Info</span>
            </div>
            <div class="card-body">
                <div style="display:flex;flex-direction:column;gap:12px;font-size:13px;">
                    <div style="display:flex;justify-content:space-between;">
                        <span style="color:#64748b;">Department</span>
                        <span style="font-weight:600;color:#1e293b;">{{ $course->department ?? '—' }}</span>
                    </div>
                    <div style="display:flex;justify-content:space-between;">
                        <span style="color:#64748b;">Semester</span>
                        <span style="font-weight:600;color:#1e293b;">Semester {{ $course->semester }}</span>
                    </div>
                    <div style="display:flex;justify-content:space-between;">
                        <span style="color:#64748b;">Available Slots</span>
                        <span style="font-weight:600;color:{{ $course->slots_available > 0 ? '#059669' : '#ef4444' }};">
                            {{ $course->slots_available }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header"><span class="card-title">Lecturer</span></div>
            <div class="card-body" style="text-align:center;">
                @if($course->lecturer)
                <img src="{{ $course->lecturer->avatar_url }}" alt="{{ $course->lecturer->full_name }}"
                    style="width:56px;height:56px;border-radius:50%;object-fit:cover;margin-bottom:12px;">
                <div style="font-weight:700;color:#1e293b;">{{ $course->lecturer->full_name }}</div>
                <div style="font-size:12px;color:#94a3b8;margin-top:3px;">{{ $course->lecturer->department }}</div>
                @else
                <div class="empty-state" style="padding:16px;">
                    <i class="fas fa-chalkboard-teacher" style="font-size:28px;"></i>
                    <p>No lecturer assigned</p>
                </div>
                @endif
            </div>
        </div>

        @can('edit courses')
        <a href="{{ route('courses.edit', $course) }}" class="btn btn-primary" style="width:100%;justify-content:center;">
            <i class="fas fa-edit"></i> Edit Course
        </a>
        @endcan
    </div>
</div>
@endsection
