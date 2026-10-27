<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            $announcements = Announcement::with('user')->latest()->paginate(10);
        } elseif ($user->hasRole('lecturer')) {
            $announcements = Announcement::with('user')
                ->whereIn('audience', ['all', 'lecturers'])
                ->where('is_published', true)
                ->latest()->paginate(10);
        } else {
            $announcements = Announcement::with('user')
                ->whereIn('audience', ['all', 'students'])
                ->where('is_published', true)
                ->latest()->paginate(10);
        }
        return view('announcements.index', compact('announcements'));
    }

    public function create()
    {
        return view('announcements.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'content'      => 'required|string',
            'audience'     => 'required|in:all,students,lecturers',
            'is_published' => 'nullable|boolean',
        ]);

        Announcement::create([
            'user_id'      => Auth::id(),
            'title'        => $data['title'],
            'content'      => $data['content'],
            'audience'     => $data['audience'],
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('announcements.index')->with('success', 'Announcement created successfully.');
    }

    public function edit(Announcement $announcement)
    {
        return view('announcements.edit', compact('announcement'));
    }

    public function update(Request $request, Announcement $announcement)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'content'      => 'required|string',
            'audience'     => 'required|in:all,students,lecturers',
            'is_published' => 'nullable|boolean',
        ]);

        $announcement->update([
            'title'        => $data['title'],
            'content'      => $data['content'],
            'audience'     => $data['audience'],
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('announcements.index')->with('success', 'Announcement updated successfully.');
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        return redirect()->route('announcements.index')->with('success', 'Announcement deleted.');
    }
}
