@extends('layouts.app')

@section('title', $lecturer->full_name)
@section('page-title', 'Lecturer Profile')
@section('breadcrumb', 'Lecturers / ' . $lecturer->full_name)

@section('content')
<div style="display:grid;grid-template-columns:280px 1fr;gap:24px;align-items:start;">
    <div class="card">
        <div style="background:linear-gradient(135deg,#064e3b,#059669);height:80px;border-radius:12px 12px 0 0;"></div>
        <div style="padding:0 22px 22px;">
            <div style="margin-top:-32px;margin-bottom:14px;">
                <img src="{{ $lecturer->avatar_url }}" alt="{{ $lecturer->full_name }}"
                    style="width:64px;height:64px;border-radius:50%;border:3px solid white;object-fit:cover;">
            </div>
            <h3 style="font-size:17px;font-weight:700;color:#1e293b;">{{ $lecturer->full_name }}</h3>
            <p style="font-size:12.5px;color:#94a3b8;margin-top:2px;">{{ $lecturer->email }}</p>
            <div style="margin-top:16px;display:flex;flex-direction:column;gap:10px;font-size:13px;">
                <div style="display:flex;justify-content:space-between;">
                    <span style="color:#64748b;">Staff No.</span>
                    <span style="font-weight:600;color:#1e293b;">{{ $lecturer->staff_number }}</span>
                </div>
                <div style="display:flex;justify-content:space-between;">
                    <span style="color:#64748b;">Department</span>
                    <span style="font-weight:600;color:#1e293b;">{{ $lecturer->department ?? '—' }}</span>
                </div>
                <div style="display:flex;justify-content:space-between;">
                    <span style="color:#64748b;">Phone</span>
                    <span style="font-weight:600;color:#1e293b;">{{ $lecturer->phone ?? '—' }}</span>
                </div>
                <div style="display:flex;justify-content:space-between;">
                    <span style="color:#64748b;">Courses</span>
                    <span style="font-weight:600;color:#1e293b;">{{ $lecturer->courses->count() }}</span>
                </div>
            </div>
            @can('edit lecturers')
            <a href="{{ route('lecturers.edit', $lecturer) }}" class="btn btn-success" style="width:100%;margin-top:18px;justify-content:center;">
                <i class="fas fa-edit"></i> Edit Profile
            </a>
            @endcan
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <span class="card-title"><i class="fas fa-book-open" style="color:#2563eb;"></i> Assigned Courses ({{ $lecturer->courses->count() }})</span>
        </div>
        <div class="card-body" style="padding:0;">
            @forelse($lecturer->courses as $course)
            <div style="padding:16px 20px;border-bottom:1px solid #f1f5f9;">
                <div style="display:flex;align-items:center;justify-content:space-between;gap:12px;flex-wrap:wrap;">
                    <div>
                        <div style="font-weight:700;font-size:14px;color:#1e293b;">{{ $course->name }}</div>
                        <div style="font-size:12px;color:#94a3b8;margin-top:3px;">
                            <span class="badge badge-info">{{ $course->course_code }}</span> &nbsp;
                            Year {{ $course->year_level }}, Sem {{ $course->semester }} &bull;
                            {{ $course->credit_units }} CU
                        </div>
                    </div>
                    <div style="text-align:center;">
                        <div style="font-size:18px;font-weight:800;color:#2563eb;">{{ $course->students->count() }}</div>
                        <div style="font-size:11px;color:#94a3b8;">Students</div>
                    </div>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-book-open"></i>
                <p>No courses assigned</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
