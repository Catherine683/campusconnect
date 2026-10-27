@extends('layouts.app')

@section('title', 'Edit Course')
@section('page-title', 'Edit Course')
@section('breadcrumb', 'Courses / Edit')

@section('content')
<div style="max-width:700px;">
    <div class="card">
        <div class="card-header">
            <span class="card-title"><i class="fas fa-edit" style="color:#f59e0b;"></i> Edit Course</span>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('courses.update', $course) }}">
                @csrf @method('PUT')
                <div class="grid-2">
                    <div class="form-group">
                        <label class="form-label">Course Code *</label>
                        <input type="text" name="course_code" value="{{ old('course_code', $course->course_code) }}"
                            class="form-control {{ $errors->has('course_code') ? 'is-invalid' : '' }}" required>
                        @error('course_code') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Credit Units *</label>
                        <input type="number" name="credit_units" value="{{ old('credit_units', $course->credit_units) }}"
                            class="form-control" min="1" max="6" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Course Name *</label>
                    <input type="text" name="name" value="{{ old('name', $course->name) }}"
                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description', $course->description) }}</textarea>
                </div>
                <div class="grid-2">
                    <div class="form-group">
                        <label class="form-label">Semester *</label>
                        <select name="semester" class="form-control" required>
                            <option value="I" {{ old('semester', $course->semester) == 'I' ? 'selected' : '' }}>Semester I</option>
                            <option value="II" {{ old('semester', $course->semester) == 'II' ? 'selected' : '' }}>Semester II</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Year Level *</label>
                        <select name="year_level" class="form-control" required>
                            @for($i=1;$i<=5;$i++)
                            <option value="{{ $i }}" {{ old('year_level', $course->year_level) == $i ? 'selected' : '' }}>Year {{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="grid-2">
                    <div class="form-group">
                        <label class="form-label">Department</label>
                        <input type="text" name="department" value="{{ old('department', $course->department) }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Max Students *</label>
                        <input type="number" name="max_students" value="{{ old('max_students', $course->max_students) }}" class="form-control" min="1" required>
                    </div>
                </div>
                <div class="grid-2">
                    <div class="form-group">
                        <label class="form-label">Assign Lecturer</label>
                        <select name="lecturer_id" class="form-control">
                            <option value="">No lecturer assigned</option>
                            @foreach($lecturers as $lec)
                            <option value="{{ $lec->id }}" {{ old('lecturer_id', $course->lecturer_id) == $lec->id ? 'selected' : '' }}>
                                {{ $lec->full_name }} ({{ $lec->department }})
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status *</label>
                        <select name="status" class="form-control" required>
                            <option value="active" {{ old('status', $course->status) == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status', $course->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
                <div style="display:flex;gap:12px;">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Course</button>
                    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
