<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('user')->latest()->paginate(10);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name'    => 'required|string|max:100',
            'last_name'     => 'required|string|max:100',
            'email'         => 'required|email|unique:students,email|unique:users,email',
            'phone'         => 'nullable|string|max:20',
            'gender'        => 'nullable|in:Male,Female,Other',
            'date_of_birth' => 'nullable|date',
            'program'       => 'nullable|string|max:200',
            'year_of_study' => 'required|integer|min:1|max:5',
            'password'      => 'required|min:6',
        ]);

        $user = User::create([
            'name'     => $data['first_name'] . ' ' . $data['last_name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'role'     => 'student',
        ]);
        $user->assignRole('student');

        $studentNumber = 'MUBS/BCS/' . date('Y') . '/' . str_pad($user->id, 4, '0', STR_PAD_LEFT);

        Student::create([
            'user_id'        => $user->id,
            'student_number' => $studentNumber,
            'first_name'     => $data['first_name'],
            'last_name'      => $data['last_name'],
            'email'          => $data['email'],
            'phone'          => $data['phone'] ?? null,
            'gender'         => $data['gender'] ?? null,
            'date_of_birth'  => $data['date_of_birth'] ?? null,
            'program'        => $data['program'] ?? null,
            'year_of_study'  => $data['year_of_study'],
            'status'         => 'active',
        ]);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function show(Student $student)
    {
        // Prevent students from viewing other students' profiles
        if (Auth::user()->hasRole('student')) {
            $myStudent = Auth::user()->student;
            if (!$myStudent || $myStudent->id !== $student->id) {
                abort(403, 'Unauthorized access.');
            }
        }
        $student->load(['registrations.course', 'courses.lecturer']);
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'first_name'    => 'required|string|max:100',
            'last_name'     => 'required|string|max:100',
            'email'         => 'required|email|unique:students,email,' . $student->id . '|unique:users,email,' . $student->user_id,
            'phone'         => 'nullable|string|max:20',
            'gender'        => 'nullable|in:Male,Female,Other',
            'date_of_birth' => 'nullable|date',
            'program'       => 'nullable|string|max:200',
            'year_of_study' => 'required|integer|min:1|max:5',
            'status'        => 'required|in:active,inactive,graduated',
        ]);

        $student->update($data);
        $student->user->update([
            'name'  => $data['first_name'] . ' ' . $data['last_name'],
            'email' => $data['email'],
        ]);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->user->delete(); // Cascades to student via DB
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }

    // Student dashboard view
    public function dashboard()
    {
        $user = Auth::user();
        $student = $user->student;
        $registrations = $student?->registrations()->with('course.lecturer')->get();
        $registeredCourseIds = $student?->courses()->pluck('courses.id')->toArray() ?? [];
        $availableCourses = \App\Models\Course::where('status', 'active')
                            ->whereNotIn('id', $registeredCourseIds)
                            ->with('lecturer')
                            ->get();
        return view('dashboards.student', compact('student', 'registrations', 'availableCourses'));
    }
}
