@extends('layouts.app')

@section('title', 'Course Registrations')
@section('page-title', 'Course Registrations')
@section('breadcrumb', 'Registrations')

@section('content')
<div class="card">
    <div class="card-header">
        <span class="card-title"><i class="fas fa-clipboard-list" style="color:#f59e0b;"></i> Course Registrations</span>
        @role('student')
        <a href="{{ route('registrations.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Register Course
        </a>
        @endrole
    </div>
    <div class="card-body" style="padding:0;">
        @if($registrations->count())
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Course</th>
                        <th>Lecturer</th>
                        <th>Status</th>
                        <th>Registered</th>
                        @can('delete registrations') <th>Actions</th> @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach($registrations as $reg)
                    <tr>
                        <td>
                            <div style="display:flex;align-items:center;gap:10px;">
                                <img src="{{ $reg->student->avatar_url }}" alt="{{ $reg->student->full_name }}"
                                    style="width:34px;height:34px;border-radius:9px;object-fit:cover;">
                                <div>
                                    <div style="font-weight:600;font-size:13px;color:#1e293b;">{{ $reg->student->full_name }}</div>
                                    <div style="font-size:11.5px;color:#94a3b8;">{{ $reg->student->student_number }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="font-weight:600;font-size:13px;color:#1e293b;">{{ $reg->course->name }}</div>
                            <span class="badge badge-info">{{ $reg->course->course_code }}</span>
                        </td>
                        <td style="font-size:13px;">{{ $reg->course->lecturer?->full_name ?? '—' }}</td>
                        <td>
                            <span class="badge {{ $reg->status === 'registered' ? 'badge-success' : ($reg->status === 'dropped' ? 'badge-danger' : 'badge-info') }}">
                                {{ ucfirst($reg->status) }}
                            </span>
                        </td>
                        <td style="font-size:12.5px;color:#64748b;">{{ $reg->created_at->format('d M Y') }}</td>
                        @can('delete registrations')
                        <td>
                            <form method="POST" action="{{ route('registrations.destroy', $reg) }}" onsubmit="return confirm('Remove this registration?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-xs btn-danger"><i class="fas fa-trash"></i> Remove</button>
                            </form>
                        </td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div style="padding:16px 20px;">{{ $registrations->links() }}</div>
        @else
        <div class="empty-state">
            <i class="fas fa-clipboard-list"></i>
            <h4>No registrations found</h4>
            @role('student')
            <a href="{{ route('registrations.create') }}" class="btn btn-primary" style="margin-top:14px;">Register for a Course</a>
            @endrole
        </div>
        @endif
    </div>
</div>

@role('admin')
<!-- Admin: Register student for course -->
<div class="card" style="margin-top:24px;">
    <div class="card-header">
        <span class="card-title"><i class="fas fa-user-plus" style="color:#2563eb;"></i> Register Student for Course</span>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('registrations.adminStore') }}" style="display:grid;grid-template-columns:1fr 1fr auto;gap:14px;align-items:end;">
            @csrf
            <div class="form-group" style="margin:0;">
                <label class="form-label">Student</label>
                <select name="student_id" class="form-control" required>
                    <option value="">Select student...</option>
                    @foreach(\App\Models\Student::orderBy('first_name')->get() as $s)
                    <option value="{{ $s->id }}">{{ $s->full_name }} ({{ $s->student_number }})</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" style="margin:0;">
                <label class="form-label">Course</label>
                <select name="course_id" class="form-control" required>
                    <option value="">Select course...</option>
                    @foreach(\App\Models\Course::where('status','active')->orderBy('name')->get() as $c)
                    <option value="{{ $c->id }}">{{ $c->name }} ({{ $c->course_code }})</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Register</button>
        </form>
    </div>
</div>
@endrole

@endsection
