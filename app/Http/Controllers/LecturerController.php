<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LecturerController extends Controller
{
    public function index()
    {
        $lecturers = Lecturer::with('user', 'courses')->latest()->paginate(10);
        return view('lecturers.index', compact('lecturers'));
    }

    public function create()
    {
        return view('lecturers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name'     => 'required|string|max:100',
            'last_name'      => 'required|string|max:100',
            'email'          => 'required|email|unique:lecturers,email|unique:users,email',
            'phone'          => 'nullable|string|max:20',
            'department'     => 'nullable|string|max:100',
            'specialization' => 'nullable|string|max:200',
            'password'       => 'required|min:6',
        ]);

        $user = User::create([
            'name'     => $data['first_name'] . ' ' . $data['last_name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'role'     => 'lecturer',
        ]);
        $user->assignRole('lecturer');

        $staffNumber = 'MUBS/STAFF/' . str_pad($user->id, 3, '0', STR_PAD_LEFT);

        Lecturer::create([
            'user_id'        => $user->id,
            'staff_number'   => $staffNumber,
            'first_name'     => $data['first_name'],
            'last_name'      => $data['last_name'],
            'email'          => $data['email'],
            'phone'          => $data['phone'] ?? null,
            'department'     => $data['department'] ?? null,
            'specialization' => $data['specialization'] ?? null,
        ]);

        return redirect()->route('lecturers.index')->with('success', 'Lecturer created successfully.');
    }

    public function show(Lecturer $lecturer)
    {
        $lecturer->load(['courses.students', 'user']);
        return view('lecturers.show', compact('lecturer'));
    }

    public function edit(Lecturer $lecturer)
    {
        return view('lecturers.edit', compact('lecturer'));
    }

    public function update(Request $request, Lecturer $lecturer)
    {
        $data = $request->validate([
            'first_name'     => 'required|string|max:100',
            'last_name'      => 'required|string|max:100',
            'email'          => 'required|email|unique:lecturers,email,' . $lecturer->id . '|unique:users,email,' . $lecturer->user_id,
            'phone'          => 'nullable|string|max:20',
            'department'     => 'nullable|string|max:100',
            'specialization' => 'nullable|string|max:200',
        ]);

        $lecturer->update($data);
        $lecturer->user->update([
            'name'  => $data['first_name'] . ' ' . $data['last_name'],
            'email' => $data['email'],
        ]);

        return redirect()->route('lecturers.index')->with('success', 'Lecturer updated successfully.');
    }

    public function destroy(Lecturer $lecturer)
    {
        $lecturer->user->delete();
        return redirect()->route('lecturers.index')->with('success', 'Lecturer deleted successfully.');
    }

    public function dashboard()
    {
        $user = Auth::user();
        $lecturer = $user->lecturer;
        $courses = $lecturer?->courses()->withCount('students')->get();
        $totalStudents = $courses?->sum('students_count') ?? 0;
        return view('dashboards.lecturer', compact('lecturer', 'courses', 'totalStudents'));
    }
}
