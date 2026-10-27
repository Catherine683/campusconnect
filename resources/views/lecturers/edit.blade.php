@extends('layouts.app')

@section('title', 'Edit Lecturer')
@section('page-title', 'Edit Lecturer')
@section('breadcrumb', 'Lecturers / Edit')

@section('content')
<div style="max-width:680px;">
    <div class="card">
        <div class="card-header">
            <span class="card-title"><i class="fas fa-edit" style="color:#f59e0b;"></i> Edit Lecturer</span>
            <a href="{{ route('lecturers.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('lecturers.update', $lecturer) }}">
                @csrf @method('PUT')
                <div class="grid-2">
                    <div class="form-group">
                        <label class="form-label">First Name *</label>
                        <input type="text" name="first_name" value="{{ old('first_name', $lecturer->first_name) }}"
                            class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Last Name *</label>
                        <input type="text" name="last_name" value="{{ old('last_name', $lecturer->last_name) }}"
                            class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Email *</label>
                    <input type="email" name="email" value="{{ old('email', $lecturer->email) }}"
                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" required>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="grid-2">
                    <div class="form-group">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone', $lecturer->phone) }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Department</label>
                        <input type="text" name="department" value="{{ old('department', $lecturer->department) }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Specialization</label>
                    <input type="text" name="specialization" value="{{ old('specialization', $lecturer->specialization) }}" class="form-control">
                </div>
                <div style="display:flex;gap:12px;">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                    <a href="{{ route('lecturers.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
