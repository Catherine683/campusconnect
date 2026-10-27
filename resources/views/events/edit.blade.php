@extends('layouts.app')

@section('title', 'Edit Event')
@section('page-title', 'Edit Event')
@section('breadcrumb', 'Events / Edit')

@section('content')
<div style="max-width:620px;">
    <div class="card">
        <div class="card-header">
            <span class="card-title"><i class="fas fa-edit" style="color:#f59e0b;"></i> Edit Event</span>
            <a href="{{ route('events.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('events.update', $event) }}">
                @csrf @method('PUT')
                <div class="form-group">
                    <label class="form-label">Event Title *</label>
                    <input type="text" name="title" value="{{ old('title', $event->title) }}"
                        class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" required>
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description', $event->description) }}</textarea>
                </div>
                <div class="grid-2">
                    <div class="form-group">
                        <label class="form-label">Event Date & Time *</label>
                        <input type="datetime-local" name="event_date"
                            value="{{ old('event_date', $event->event_date->format('Y-m-d\TH:i')) }}"
                            class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Event Type *</label>
                        <select name="type" class="form-control" required>
                            @foreach(['general','academic','social'] as $t)
                            <option value="{{ $t }}" {{ old('type', $event->type) == $t ? 'selected' : '' }}>{{ ucfirst($t) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Location</label>
                    <input type="text" name="location" value="{{ old('location', $event->location) }}" class="form-control">
                </div>
                <div style="display:flex;gap:12px;">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Event</button>
                    <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
