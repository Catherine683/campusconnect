@extends('layouts.app')

@section('title', 'New Announcement')
@section('page-title', 'New Announcement')
@section('breadcrumb', 'Announcements / Create')

@section('content')
<div style="max-width:680px;">
    <div class="card">
        <div class="card-header">
            <span class="card-title"><i class="fas fa-bullhorn" style="color:#ef4444;"></i> Create Announcement</span>
            <a href="{{ route('announcements.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('announcements.store') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label">Title *</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                        placeholder="Announcement title" required>
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Content *</label>
                    <textarea name="content" rows="5"
                        class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}"
                        placeholder="Announcement details..." required>{{ old('content') }}</textarea>
                    @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Target Audience *</label>
                    <select name="audience" class="form-control" required>
                        <option value="all" {{ old('audience') == 'all' ? 'selected' : '' }}>Everyone</option>
                        <option value="students" {{ old('audience') == 'students' ? 'selected' : '' }}>Students Only</option>
                        <option value="lecturers" {{ old('audience') == 'lecturers' ? 'selected' : '' }}>Lecturers Only</option>
                    </select>
                </div>
                <div class="form-group">
                    <label style="display:flex;align-items:center;gap:8px;cursor:pointer;font-size:13.5px;color:#334155;">
                        <input type="checkbox" name="is_published" value="1" checked
                            style="width:16px;height:16px;accent-color:#4f46e5;">
                        Publish immediately
                    </label>
                </div>
                <div style="display:flex;gap:12px;">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Publish</button>
                    <a href="{{ route('announcements.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
