<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->hasRole('admin')) {
                return redirect()->route('admin.dashboard')->with('success', 'Welcome back, ' . $user->name . '!');
            } elseif ($user->hasRole('lecturer')) {
                return redirect()->route('lecturer.dashboard')->with('success', 'Welcome back, ' . $user->name . '!');
            } else {
                return redirect()->route('student.dashboard')->with('success', 'Welcome back, ' . $user->name . '!');
            }
        }

        return back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        $user = \App\Models\User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => $data['password'],
            'role'     => 'student',
        ]);
        $user->assignRole('student');

        // Create student profile
        \App\Models\Student::create([
            'user_id'        => $user->id,
            'student_number' => 'MUBS/BCS/' . date('Y') . '/' . str_pad($user->id, 4, '0', STR_PAD_LEFT),
            'first_name'     => explode(' ', $data['name'])[0],
            'last_name'      => explode(' ', $data['name'], 2)[1] ?? '',
            'email'          => $data['email'],
            'status'         => 'active',
        ]);

        Auth::login($user);

        return redirect()->route('student.dashboard')->with('success', 'Account created successfully! Welcome to CampusConnect.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'You have been logged out.');
    }
}
