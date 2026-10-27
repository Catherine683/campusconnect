@extends('layouts.app')

@section('title', 'Students')
@section('page-title', 'Students')
@section('breadcrumb', 'Students')

@section('content')
<div class="card">
    <div class="card-header">
        <span class="card-title"><i class="fas fa-user-graduate" style="color:#7c3aed;"></i> All Students</span>
        @can('create students')
        <a href="{{ route('students.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Student
        </a>
        @endcan
    </div>
    <div class="card-body" style="padding:0;">
        @if($students->count())
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Student No.</th>
                        <th>Program</th>
                        <th>Year</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>
                            <div style="display:flex;align-items:center;gap:10px;">
                                <img src="{{ $student->avatar_url }}" alt="{{ $student->full_name }}"
                                    style="width:38px;height:38px;border-radius:10px;object-fit:cover;">
                                <div>
                                    <div style="font-weight:600;color:#1e293b;">{{ $student->full_name }}</div>
                                    <div style="font-size:12px;color:#94a3b8;">{{ $student->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge badge-info">{{ $student->student_number }}</span></td>
                        <td style="font-size:13px;">{{ $student->program ?? '—' }}</td>
                        <td>Year {{ $student->year_of_study }}</td>
                        <td>
                            <span class="badge {{ $student->status === 'active' ? 'badge-success' : ($student->status === 'graduated' ? 'badge-info' : 'badge-gray') }}">
                                {{ ucfirst($student->status) }}
                            </span>
                        </td>
                        <td>
                            <div style="display:flex;gap:6px;">
                                <a href="{{ route('students.show', $student) }}" class="btn btn-xs btn-secondary">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @can('edit students')
                                <a href="{{ route('students.edit', $student) }}" class="btn btn-xs btn-warning" style="color:white;">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @endcan
                                @can('delete students')
                                <form method="POST" action="{{ route('students.destroy', $student) }}" onsubmit="return confirm('Delete this student?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div style="padding:16px 20px;">
            {{ $students->links() }}
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-user-graduate"></i>
            <h4>No students found</h4>
            @can('create students')
            <a href="{{ route('students.create') }}" class="btn btn-primary" style="margin-top:14px;">Add First Student</a>
            @endcan
        </div>
        @endif
    </div>
</div>
@endsection
