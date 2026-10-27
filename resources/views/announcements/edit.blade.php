@extends('layouts.app')

@section('title', 'Edit Announcement')
@section('page-title', 'Edit Announcement')
@section('breadcrumb', 'Announcements / Edit')

@section('content')
<div style="max-width:680px;">
    <div class="card">
        <div class="card-header">
            <span class="card-title"><i class="fas fa-edit" style="color:#f59e0b;"></i> Edit Announcement</span>
            <a href="{{ route('announcements.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('announcements.update', $announcement) }}">
                @csrf @method('PUT')
                <div class="form-group">
                    <label class="form-label">Title *</label>
                    <input type="text" name="title" value="{{ old('title', $announcement->title) }}"
                        class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" required>
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Content *</label>
                    <textarea name="content" rows="5"
                        class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" required>{{ old('content', $announcement->content) }}</textarea>
                    @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Target Audience *</label>
                    <select name="audience" class="form-control" required>
                        <option value="all" {{ old('audience', $announcement->audience) == 'all' ? 'selected' : '' }}>Everyone</option>
                        <option value="students" {{ old('audience', $announcement->audience) == 'students' ? 'selected' : '' }}>Students Only</option>
                        <option value="lecturers" {{ old('audience', $announcement->audience) == 'lecturers' ? 'selected' : '' }}>Lecturers Only</option>
                    </select>
                </div>
                <div class="form-group">
                    <label style="display:flex;align-items:center;gap:8px;cursor:pointer;font-size:13.5px;color:#334155;">
                        <input type="checkbox" name="is_published" value="1" {{ $announcement->is_published ? 'checked' : '' }}
                            style="width:16px;height:16px;accent-color:#4f46e5;">
                        Published
                    </label>
                </div>
                <div style="display:flex;gap:12px;">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                    <a href="{{ route('announcements.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
