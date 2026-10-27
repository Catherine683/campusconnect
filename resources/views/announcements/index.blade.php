@extends('layouts.app')

@section('title', 'Announcements')
@section('page-title', 'Announcements')
@section('breadcrumb', 'Announcements')

@section('content')

<div class="card-header flex-between" style="background:white;border-radius:12px 12px 0 0;padding:18px 22px;border:1px solid #e2e8f0;border-bottom:none;">
    <span class="card-title"><i class="fas fa-bullhorn" style="color:#ef4444;"></i> Announcements</span>
    @can('create announcements')
    <a href="{{ route('announcements.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> New Announcement</a>
    @endcan
</div>

@if($announcements->count())
    <div style="display:flex;flex-direction:column;gap:0;border:1px solid #e2e8f0;border-radius:0 0 12px 12px;overflow:hidden;background:white;">
        @foreach($announcements as $ann)
        <div style="padding:20px 24px;border-bottom:1px solid #f1f5f9;">
            <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:12px;flex-wrap:wrap;">
                <div style="flex:1;">
                    <div style="display:flex;align-items:center;gap:10px;margin-bottom:8px;flex-wrap:wrap;">
                        <span class="badge {{ $ann->audience === 'all' ? 'badge-info' : ($ann->audience === 'students' ? 'badge-purple' : 'badge-success') }}">
                            <i class="fas fa-users" style="font-size:9px;"></i>
                            {{ ucfirst($ann->audience) }}
                        </span>
                        @unless($ann->is_published)
                        <span class="badge badge-warning">Draft</span>
                        @endunless
                    </div>
                    <h3 style="font-size:15px;font-weight:700;color:#1e293b;margin-bottom:8px;">{{ $ann->title }}</h3>
                    <p style="font-size:13.5px;color:#475569;line-height:1.6;">{{ Str::limit($ann->content, 200) }}</p>
                    <div style="font-size:12px;color:#94a3b8;margin-top:10px;display:flex;align-items:center;gap:12px;">
                        <span><i class="fas fa-user"></i> {{ $ann->user->name }}</span>
                        <span><i class="fas fa-clock"></i> {{ $ann->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                @can('edit announcements')
                <div style="display:flex;gap:6px;flex-shrink:0;">
                    <a href="{{ route('announcements.edit', $ann) }}" class="btn btn-xs btn-warning" style="color:white;">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form method="POST" action="{{ route('announcements.destroy', $ann) }}" onsubmit="return confirm('Delete this announcement?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </div>
                @endcan
            </div>
        </div>
        @endforeach
    </div>
    <div style="padding:16px 0;">{{ $announcements->links() }}</div>
@else
    <div class="card">
        <div class="empty-state">
            <i class="fas fa-bullhorn"></i>
            <h4>No announcements</h4>
            <p>There are no announcements at this time.</p>
        </div>
    </div>
@endif

@endsection
