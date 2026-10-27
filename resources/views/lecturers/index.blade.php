@extends('layouts.app')

@section('title', 'Lecturers')
@section('page-title', 'Lecturers')
@section('breadcrumb', 'Lecturers')

@section('content')
<div class="card">
    <div class="card-header">
        <span class="card-title"><i class="fas fa-chalkboard-teacher" style="color:#059669;"></i> All Lecturers</span>
        @can('create lecturers')
        <a href="{{ route('lecturers.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Add Lecturer</a>
        @endcan
    </div>
    <div class="card-body" style="padding:0;">
        @if($lecturers->count())
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Lecturer</th>
                        <th>Staff No.</th>
                        <th>Department</th>
                        <th>Specialization</th>
                        <th>Courses</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lecturers as $lecturer)
                    <tr>
                        <td>
                            <div style="display:flex;align-items:center;gap:10px;">
                                <img src="{{ $lecturer->avatar_url }}" alt="{{ $lecturer->full_name }}"
                                    style="width:38px;height:38px;border-radius:10px;object-fit:cover;">
                                <div>
                                    <div style="font-weight:600;color:#1e293b;">{{ $lecturer->full_name }}</div>
                                    <div style="font-size:12px;color:#94a3b8;">{{ $lecturer->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge badge-success">{{ $lecturer->staff_number }}</span></td>
                        <td>{{ $lecturer->department ?? '—' }}</td>
                        <td style="font-size:13px;">{{ $lecturer->specialization ?? '—' }}</td>
                        <td><span class="badge badge-info">{{ $lecturer->courses->count() }}</span></td>
                        <td>
                            <div style="display:flex;gap:6px;">
                                <a href="{{ route('lecturers.show', $lecturer) }}" class="btn btn-xs btn-secondary"><i class="fas fa-eye"></i></a>
                                @can('edit lecturers')
                                <a href="{{ route('lecturers.edit', $lecturer) }}" class="btn btn-xs btn-warning" style="color:white;"><i class="fas fa-edit"></i></a>
                                @endcan
                                @can('delete lecturers')
                                <form method="POST" action="{{ route('lecturers.destroy', $lecturer) }}" onsubmit="return confirm('Delete this lecturer?')">
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
        <div style="padding:16px 20px;">{{ $lecturers->links() }}</div>
        @else
        <div class="empty-state">
            <i class="fas fa-chalkboard-teacher"></i>
            <h4>No lecturers yet</h4>
        </div>
        @endif
    </div>
</div>
@endsection
