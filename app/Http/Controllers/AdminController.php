<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Course;
use App\Models\CourseRegistration;
use App\Models\Event;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'students'      => Student::count(),
            'lecturers'     => Lecturer::count(),
            'courses'       => Course::count(),
            'registrations' => CourseRegistration::count(),
            'users'         => User::count(),
        ];

        $recentStudents = Student::latest()->take(5)->get();
        $recentCourses  = Course::with('lecturer')->latest()->take(5)->get();
        $announcements  = Announcement::with('user')->latest()->take(3)->get();
        $events         = Event::where('event_date', '>=', now())->orderBy('event_date')->take(3)->get();

        return view('dashboards.admin', compact('stats', 'recentStudents', 'recentCourses', 'announcements', 'events'));
    }
}
