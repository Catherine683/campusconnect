@extends('layouts.app')

@section('title', 'Add Course')
@section('page-title', 'Add Course')
@section('breadcrumb', 'Courses / Add')

@section('content')
<div style="max-width:700px;">
    <div class="card">
        <div class="card-header">
            <span class="card-title"><i class="fas fa-plus-circle" style="color:#2563eb;"></i> Add New Course</span>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('courses.store') }}">
                @csrf
                <div class="grid-2">
                    <div class="form-group">
                        <label class="form-label">Course Code *</label>
                        <input type="text" name="course_code" value="{{ old('course_code') }}"
                            class="form-control {{ $errors->has('course_code') ? 'is-invalid' : '' }}"
                            placeholder="e.g. BUC3131" required>
                        @error('course_code') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Credit Units *</label>
                        <input type="number" name="credit_units" value="{{ old('credit_units', 3) }}"
                            class="form-control" min="1" max="6" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Course Name *</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        placeholder="e.g. Advanced Web Application Development" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Brief course description...">{{ old('description') }}</textarea>
                </div>

                <div class="grid-2">
                    <div class="form-group">
                        <label class="form-label">Semester *</label>
                        <select name="semester" class="form-control" required>
                            <option value="I" {{ old('semester') == 'I' ? 'selected' : '' }}>Semester I</option>
                            <option value="II" {{ old('semester') == 'II' ? 'selected' : '' }}>Semester II</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Year Level *</label>
                        <select name="year_level" class="form-control" required>
                            @for($i=1;$i<=5;$i++)
                            <option value="{{ $i }}" {{ old('year_level', 1) == $i ? 'selected' : '' }}>Year {{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="grid-2">
                    <div class="form-group">
                        <label class="form-label">Department</label>
                        <input type="text" name="department" value="{{ old('department') }}"
                            class="form-control" placeholder="e.g. Business Computing">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Max Students *</label>
                        <input type="number" name="max_students" value="{{ old('max_students', 50) }}"
                            class="form-control" min="1" required>
                    </div>
                </div>

                <div class="grid-2">
                    <div class="form-group">
                        <label class="form-label">Assign Lecturer</label>
                        <select name="lecturer_id" class="form-control">
                            <option value="">No lecturer assigned</option>
                            @foreach($lecturers as $lec)
                            <option value="{{ $lec->id }}" {{ old('lecturer_id') == $lec->id ? 'selected' : '' }}>
                                {{ $lec->full_name }} ({{ $lec->department }})
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status *</label>
                        <select name="status" class="form-control" required>
                            <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>

                <div style="display:flex;gap:12px;">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Create Course</button>
                    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
