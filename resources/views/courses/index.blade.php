@extends('layouts.app')

@section('title', 'Courses')
@section('page-title', 'Courses')
@section('breadcrumb', 'Courses')

@section('content')
<div class="card">
    <div class="card-header">
        <span class="card-title"><i class="fas fa-book-open" style="color:#2563eb;"></i> All Courses</span>
        @can('create courses')
        <a href="{{ route('courses.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Course</a>
        @endcan
    </div>
    <div class="card-body" style="padding:0;">
        @if($courses->count())
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Code</th>
                        <th>Lecturer</th>
                        <th>Year / Sem</th>
                        <th>Enrolled</th>
                        <th>Status</th>
                        <th>Actions</th>
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
                        <td style="font-size:13px;">{{ $course->lecturer?->full_name ?? '—' }}</td>
                        <td>Yr {{ $course->year_level }}, Sem {{ $course->semester }}</td>
                        <td>
                            <div style="font-size:13px;">{{ $course->enrolled_count }}/{{ $course->max_students }}</div>
                            <div style="background:#f1f5f9;border-radius:4px;height:5px;width:80px;margin-top:4px;">
                                @php $p = $course->max_students > 0 ? min(100,($course->enrolled_count/$course->max_students)*100) : 0; @endphp
                                <div style="background:{{ $p>=80?'#ef4444':($p>=60?'#f59e0b':'#10b981') }};height:5px;border-radius:4px;width:{{ $p }}%;"></div>
                            </div>
                        </td>
                        <td>
                            <span class="badge {{ $course->status === 'active' ? 'badge-success' : 'badge-gray' }}">
                                {{ ucfirst($course->status) }}
                            </span>
                        </td>
                        <td>
                            <div style="display:flex;gap:6px;">
                                <a href="{{ route('courses.show', $course) }}" class="btn btn-xs btn-secondary"><i class="fas fa-eye"></i></a>
                                @can('edit courses')
                                <a href="{{ route('courses.edit', $course) }}" class="btn btn-xs btn-warning" style="color:white;"><i class="fas fa-edit"></i></a>
                                @endcan
                                @can('delete courses')
                                <form method="POST" action="{{ route('courses.destroy', $course) }}" onsubmit="return confirm('Delete this course?')">
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
        <div style="padding:16px 20px;">{{ $courses->links() }}</div>
        @else
        <div class="empty-state">
            <i class="fas fa-book-open"></i>
            <h4>No courses found</h4>
        </div>
        @endif
    </div>
</div>
@endsection
