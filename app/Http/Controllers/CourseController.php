<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lecturer;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('lecturer')->latest()->paginate(10);
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        $lecturers = Lecturer::all();
        return view('courses.create', compact('lecturers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'course_code'  => 'required|string|max:20|unique:courses,course_code',
            'name'         => 'required|string|max:200',
            'description'  => 'nullable|string',
            'credit_units' => 'required|integer|min:1|max:6',
            'semester'     => 'required|in:I,II',
            'year_level'   => 'required|integer|min:1|max:5',
            'department'   => 'nullable|string|max:100',
            'max_students' => 'required|integer|min:1',
            'lecturer_id'  => 'nullable|exists:lecturers,id',
            'status'       => 'required|in:active,inactive',
        ]);

        Course::create($data);

        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    public function show(Course $course)
    {
        $course->load(['lecturer', 'students.user']);
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $lecturers = Lecturer::all();
        return view('courses.edit', compact('course', 'lecturers'));
    }

    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'course_code'  => 'required|string|max:20|unique:courses,course_code,' . $course->id,
            'name'         => 'required|string|max:200',
            'description'  => 'nullable|string',
            'credit_units' => 'required|integer|min:1|max:6',
            'semester'     => 'required|in:I,II',
            'year_level'   => 'required|integer|min:1|max:5',
            'department'   => 'nullable|string|max:100',
            'max_students' => 'required|integer|min:1',
            'lecturer_id'  => 'nullable|exists:lecturers,id',
            'status'       => 'required|in:active,inactive',
        ]);

        $course->update($data);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
