@extends('layouts.app')

@section('title', 'Events')
@section('page-title', 'Campus Events')
@section('breadcrumb', 'Events')

@section('content')

<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;flex-wrap:wrap;gap:12px;">
    <div>
        <h2 style="font-size:18px;font-weight:700;color:#1e293b;">Upcoming Campus Events</h2>
        <p style="font-size:13px;color:#94a3b8;">Stay updated with the latest happenings at MUBS</p>
    </div>
    @can('create events')
    <a href="{{ route('events.create') }}" class="btn btn-primary"><i class="fas fa-calendar-plus"></i> Add Event</a>
    @endcan
</div>

@if($events->count())
<div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(320px,1fr));gap:20px;">
    @foreach($events as $event)
    <div class="card" style="overflow:hidden;">
        <div style="height:6px;background:{{ $event->type === 'academic' ? 'linear-gradient(90deg,#4f46e5,#7c3aed)' : ($event->type === 'social' ? 'linear-gradient(90deg,#059669,#10b981)' : 'linear-gradient(90deg,#d97706,#f59e0b)') }};"></div>
        <div class="card-body">
            <div style="display:flex;align-items:flex-start;gap:16px;">
                <div style="text-align:center;background:#f8fafc;border-radius:12px;padding:10px 14px;min-width:56px;flex-shrink:0;">
                    <div style="font-size:22px;font-weight:800;color:#1e293b;line-height:1;">{{ $event->event_date->format('d') }}</div>
                    <div style="font-size:11.5px;font-weight:700;color:#64748b;text-transform:uppercase;">{{ $event->event_date->format('M') }}</div>
                    <div style="font-size:10.5px;color:#94a3b8;">{{ $event->event_date->format('Y') }}</div>
                </div>
                <div style="flex:1;min-width:0;">
                    <div style="display:flex;align-items:center;gap:8px;margin-bottom:6px;">
                        <span class="badge {{ $event->type === 'academic' ? 'badge-purple' : ($event->type === 'social' ? 'badge-success' : 'badge-warning') }}">
                            {{ ucfirst($event->type) }}
                        </span>
                    </div>
                    <h3 style="font-size:14.5px;font-weight:700;color:#1e293b;margin-bottom:6px;">{{ $event->title }}</h3>
                    @if($event->description)
                    <p style="font-size:12.5px;color:#64748b;line-height:1.5;margin-bottom:8px;">{{ Str::limit($event->description, 100) }}</p>
                    @endif
                    <div style="font-size:12px;color:#94a3b8;display:flex;flex-wrap:wrap;gap:10px;">
                        <span><i class="fas fa-clock"></i> {{ $event->event_date->format('h:i A') }}</span>
                        @if($event->location)
                        <span><i class="fas fa-map-marker-alt"></i> {{ $event->location }}</span>
                        @endif
                    </div>
                </div>
            </div>
            @can('edit events')
            <div style="display:flex;gap:8px;margin-top:14px;padding-top:14px;border-top:1px solid #f1f5f9;">
                <a href="{{ route('events.edit', $event) }}" class="btn btn-xs btn-warning" style="color:white;">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <form method="POST" action="{{ route('events.destroy', $event) }}" onsubmit="return confirm('Delete this event?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></button>
                </form>
            </div>
            @endcan
        </div>
    </div>
    @endforeach
</div>
<div style="margin-top:20px;">{{ $events->links() }}</div>
@else
<div class="card">
    <div class="empty-state">
        <i class="fas fa-calendar-alt"></i>
        <h4>No upcoming events</h4>
        <p>There are no scheduled events at this time.</p>
    </div>
</div>
@endif

@endsection
