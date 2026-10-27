@extends('layouts.app')

@section('title', $student->full_name)
@section('page-title', 'Student Profile')
@section('breadcrumb', 'Students / ' . $student->full_name)

@section('content')
<div style="display:grid;grid-template-columns:300px 1fr;gap:24px;align-items:start;">

    <!-- Profile Card -->
    <div class="card">
        <div style="background:linear-gradient(135deg,#4f46e5,#7c3aed);height:80px;border-radius:12px 12px 0 0;"></div>
        <div style="padding:0 22px 22px;">
            <div style="margin-top:-32px;margin-bottom:16px;">
                <img src="{{ $student->avatar_url }}" alt="{{ $student->full_name }}"
                    style="width:64px;height:64px;border-radius:50%;border:3px solid white;object-fit:cover;">
            </div>
            <h3 style="font-size:17px;font-weight:700;color:#1e293b;">{{ $student->full_name }}</h3>
            <p style="font-size:12.5px;color:#94a3b8;margin-top:2px;">{{ $student->email }}</p>

            <div style="margin-top:18px;display:flex;flex-direction:column;gap:10px;">
                <div style="display:flex;justify-content:space-between;font-size:13px;">
                    <span style="color:#64748b;">Student No.</span>
                    <span style="font-weight:600;color:#1e293b;">{{ $student->student_number }}</span>
                </div>
                <div style="display:flex;justify-content:space-between;font-size:13px;">
                    <span style="color:#64748b;">Year</span>
                    <span style="font-weight:600;color:#1e293b;">Year {{ $student->year_of_study }}</span>
                </div>
                <div style="display:flex;justify-content:space-between;font-size:13px;">
                    <span style="color:#64748b;">Gender</span>
                    <span style="font-weight:600;color:#1e293b;">{{ $student->gender ?? '—' }}</span>
                </div>
                <div style="display:flex;justify-content:space-between;font-size:13px;">
                    <span style="color:#64748b;">Phone</span>
                    <span style="font-weight:600;color:#1e293b;">{{ $student->phone ?? '—' }}</span>
                </div>
                <div style="display:flex;justify-content:space-between;font-size:13px;">
                    <span style="color:#64748b;">Status</span>
                    <span class="badge {{ $student->status === 'active' ? 'badge-success' : 'badge-gray' }}">
                        {{ ucfirst($student->status) }}
                    </span>
                </div>
            </div>

            @can('edit students')
            <a href="{{ route('students.edit', $student) }}" class="btn btn-primary" style="width:100%;margin-top:18px;justify-content:center;">
                <i class="fas fa-edit"></i> Edit Profile
            </a>
            @endcan
        </div>
    </div>

    <!-- Right Column -->
    <div style="display:flex;flex-direction:column;gap:20px;">

        <!-- Program Info -->
        <div class="card">
            <div class="card-header">
                <span class="card-title"><i class="fas fa-graduation-cap" style="color:#7c3aed;"></i> Academic Info</span>
            </div>
            <div class="card-body">
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
                    <div>
                        <div style="font-size:11.5px;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.5px;margin-bottom:4px;">Program</div>
                        <div style="font-size:14px;font-weight:600;color:#1e293b;">{{ $student->program ?? '—' }}</div>
                    </div>
                    <div>
                        <div style="font-size:11.5px;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.5px;margin-bottom:4px;">Date of Birth</div>
                        <div style="font-size:14px;font-weight:600;color:#1e293b;">{{ $student->date_of_birth?->format('d M Y') ?? '—' }}</div>
                    </div>
                    <div>
                        <div style="font-size:11.5px;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.5px;margin-bottom:4px;">Registered Since</div>
                        <div style="font-size:14px;font-weight:600;color:#1e293b;">{{ $student->created_at->format('d M Y') }}</div>
                    </div>
                    <div>
                        <div style="font-size:11.5px;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.5px;margin-bottom:4px;">Courses</div>
                        <div style="font-size:14px;font-weight:600;color:#1e293b;">{{ $student->registrations->count() }} registered</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Registered Courses -->
        <div class="card">
            <div class="card-header">
                <span class="card-title"><i class="fas fa-book-open" style="color:#2563eb;"></i> Registered Courses</span>
            </div>
            <div class="card-body" style="padding:0;">
                @forelse($student->registrations as $reg)
                <div style="padding:13px 20px;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;justify-content:space-between;">
                    <div>
                        <div style="font-weight:600;font-size:13.5px;color:#1e293b;">{{ $reg->course->name }}</div>
                        <div style="font-size:12px;color:#94a3b8;">
                            {{ $reg->course->course_code }} &bull; {{ $reg->course->credit_units }} CU &bull;
                            {{ $reg->course->lecturer?->full_name ?? 'TBD' }}
                        </div>
                    </div>
                    <span class="badge {{ $reg->status === 'registered' ? 'badge-success' : 'badge-gray' }}">
                        {{ ucfirst($reg->status) }}
                    </span>
                </div>
                @empty
                <div class="empty-state">
                    <i class="fas fa-book-open"></i>
                    <p>No courses registered</p>
                </div>
                @endforelse
            </div>
        </div>

    </div>
</div>
@endsection
