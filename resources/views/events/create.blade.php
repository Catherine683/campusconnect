@extends('layouts.app')

@section('title', 'Add Event')
@section('page-title', 'Add Event')
@section('breadcrumb', 'Events / Add')

@section('content')
<div style="max-width:620px;">
    <div class="card">
        <div class="card-header">
            <span class="card-title"><i class="fas fa-calendar-plus" style="color:#7c3aed;"></i> Create Event</span>
            <a href="{{ route('events.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('events.store') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label">Event Title *</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                        placeholder="e.g. Career Fair 2026" required>
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Event details...">{{ old('description') }}</textarea>
                </div>
                <div class="grid-2">
                    <div class="form-group">
                        <label class="form-label">Event Date & Time *</label>
                        <input type="datetime-local" name="event_date" value="{{ old('event_date') }}"
                            class="form-control {{ $errors->has('event_date') ? 'is-invalid' : '' }}" required>
                        @error('event_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Event Type *</label>
                        <select name="type" class="form-control" required>
                            <option value="general" {{ old('type') == 'general' ? 'selected' : '' }}>General</option>
                            <option value="academic" {{ old('type') == 'academic' ? 'selected' : '' }}>Academic</option>
                            <option value="social" {{ old('type') == 'social' ? 'selected' : '' }}>Social</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Location</label>
                    <input type="text" name="location" value="{{ old('location') }}"
                        class="form-control" placeholder="e.g. MUBS Main Hall">
                </div>
                <div style="display:flex;gap:12px;">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Create Event</button>
                    <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
