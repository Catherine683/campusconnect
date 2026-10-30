<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseRegistration;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            $registrations = CourseRegistration::with(['student', 'course'])->latest()->paginate(15);
        } elseif (Auth::user()->hasRole('lecturer')) {
            $lecturer = Auth::user()->lecturer;
            $courseIds = $lecturer?->courses()->pluck('id') ?? [];
            $registrations = CourseRegistration::with(['student', 'course'])
                ->whereIn('course_id', $courseIds)
                ->latest()
                ->paginate(15);
        } else {
            $student = Auth::user()->student;
            $registrations = CourseRegistration::with(['student', 'course'])
                ->where('student_id', $student?->id)
                ->latest()
                ->paginate(15);
        }

        return view('registrations.index', compact('registrations'));
    }

    public function create()
    {
        $student = Auth::user()->student;
        $registeredIds = $student?->courses()->pluck('courses.id')->toArray() ?? [];
        $courses = Course::where('status', 'active')
                         ->whereNotIn('id', $registeredIds)
                         ->with('lecturer')
                         ->get();
        return view('registrations.create', compact('courses', 'student'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        $student = Auth::user()->student;

        if (!$student) {
            return back()->with('error', 'No student profile found for your account.');
        }

        // Check duplicate
        $exists = CourseRegistration::where('student_id', $student->id)
                                    ->where('course_id', $data['course_id'])
                                    ->exists();

        if ($exists) {
            return back()->with('error', 'You are already registered for this course.');
        }

        // Check capacity
        $course = Course::findOrFail($data['course_id']);
        if ($course->enrolled_count >= $course->max_students) {
            return back()->with('error', 'This course is full. No more registrations accepted.');
        }

        CourseRegistration::create([
            'student_id' => $student->id,
            'course_id'  => $data['course_id'],
            'status'     => 'registered',
        ]);

        return redirect()->route('registrations.index')->with('success', 'You have been registered for ' . $course->name . ' successfully.');
    }

    public function adminStore(Request $request)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id'  => 'required|exists:courses,id',
        ]);

        $exists = CourseRegistration::where('student_id', $data['student_id'])
                                    ->where('course_id', $data['course_id'])
                                    ->exists();
        if ($exists) {
            return back()->with('error', 'Student is already registered for this course.');
        }

        $course = Course::findOrFail($data['course_id']);
        if ($course->enrolled_count >= $course->max_students) {
            return back()->with('error', 'This course is full.');
        }

        CourseRegistration::create([
            'student_id' => $data['student_id'],
            'course_id'  => $data['course_id'],
            'status'     => 'registered',
        ]);

        return redirect()->route('registrations.index')->with('success', 'Student registered for course successfully.');
    }

    public function destroy(CourseRegistration $registration)
    {
        $user = Auth::user();

        abort_unless($user->hasRole('admin') || $user->hasRole('student'), 403, 'Unauthorized.');

        if ($user->hasRole('student')) {
            $student = $user->student;

            if (!$student || $registration->student_id !== $student->id) {
                abort(403, 'Unauthorized.');
            }
        }

        $courseName = $registration->course->name;
        $registration->delete();

        return redirect()->route('registrations.index')->with('success', 'Registration for ' . $courseName . ' has been removed.');
    }
}
