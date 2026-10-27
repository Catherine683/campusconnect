@extends('layouts.app')

@section('title', 'Add Lecturer')
@section('page-title', 'Add Lecturer')
@section('breadcrumb', 'Lecturers / Add')

@section('content')
<div style="max-width:680px;">
    <div class="card">
        <div class="card-header">
            <span class="card-title"><i class="fas fa-user-tie" style="color:#059669;"></i> Add New Lecturer</span>
            <a href="{{ route('lecturers.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('lecturers.store') }}">
                @csrf
                <div class="grid-2">
                    <div class="form-group">
                        <label class="form-label">First Name *</label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}"
                            class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" required>
                        @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Last Name *</label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}"
                            class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" required>
                        @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Email *</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" required>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="grid-2">
                    <div class="form-group">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="+256...">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Department</label>
                        <input type="text" name="department" value="{{ old('department') }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Specialization</label>
                    <input type="text" name="specialization" value="{{ old('specialization') }}" class="form-control">
                </div>
                <div class="form-group">
                    <label class="form-label">Password *</label>
                    <input type="password" name="password"
                        class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                        placeholder="Min 6 characters" required>
                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div style="display:flex;gap:12px;">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Create Lecturer</button>
                    <a href="{{ route('lecturers.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
