@extends('layouts.app')

@section('title', 'Add Student')
@section('page-title', 'Add Student')
@section('breadcrumb', 'Students / Add')

@section('content')
<div style="max-width:700px;">
    <div class="card">
        <div class="card-header">
            <span class="card-title"><i class="fas fa-user-plus" style="color:#7c3aed;"></i> Add New Student</span>
            <a href="{{ route('students.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('students.store') }}">
                @csrf
                <div class="grid-2">
                    <div class="form-group">
                        <label class="form-label">First Name *</label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}"
                            class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}"
                            placeholder="First name" required>
                        @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Last Name *</label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}"
                            class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}"
                            placeholder="Last name" required>
                        @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Email Address *</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        placeholder="student@example.com" required>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="grid-2">
                    <div class="form-group">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone') }}"
                            class="form-control" placeholder="+256...">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Gender</label>
                        <select name="gender" class="form-control">
                            <option value="">Select gender</option>
                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                </div>

                <div class="grid-2">
                    <div class="form-group">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Year of Study *</label>
                        <select name="year_of_study" class="form-control" required>
                            @for($i=1;$i<=5;$i++)
                            <option value="{{ $i }}" {{ old('year_of_study', 1) == $i ? 'selected' : '' }}>Year {{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Program</label>
                    <input type="text" name="program" value="{{ old('program') }}"
                        class="form-control" placeholder="e.g. Bachelor of Business Computing">
                </div>

                <div class="form-group">
                    <label class="form-label">Initial Password *</label>
                    <input type="password" name="password"
                        class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                        placeholder="Min 6 characters" required>
                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    <div class="form-hint">Student will use this to log in</div>
                </div>

                <div style="display:flex;gap:12px;margin-top:8px;">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Create Student
                    </button>
                    <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
