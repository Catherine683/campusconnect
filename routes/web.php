<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// ── Public ────────────────────────────────────────────────────────────────────
Route::get('/', fn() => view('welcome'))->name('home');

// ── Guest only ────────────────────────────────────────────────────────────────
Route::middleware('guest')->group(function () {
    Route::get('/login',    [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login',   [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register',[AuthController::class, 'register']);
});

// ── Authenticated ─────────────────────────────────────────────────────────────
Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Profile (all roles)
    Route::get('/profile',          [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile',          [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

    // ── Shared read routes (all authenticated roles) ───────────────────────────
    Route::get('/courses',           [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/{course}',  [CourseController::class, 'show'])->name('courses.show');
    Route::get('/announcements',     [AnnouncementController::class, 'index'])->name('announcements.index');
    Route::get('/events',            [EventController::class, 'index'])->name('events.index');
    Route::get('/registrations',     [RegistrationController::class, 'index'])->name('registrations.index');
    Route::delete('/registrations/{registration}', [RegistrationController::class, 'destroy'])
        ->middleware('role:admin|student')
        ->name('registrations.destroy');
    Route::get('/students/{student}',[StudentController::class, 'show'])->name('students.show');
    Route::get('/students',          [StudentController::class, 'index'])->name('students.index');

    // ── Admin ─────────────────────────────────────────────────────────────────
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        // Student CRUD (create/edit/delete)
        Route::get('/students/create',           [StudentController::class, 'create'])->name('students.create');
        Route::post('/students',                 [StudentController::class, 'store'])->name('students.store');
        Route::get('/students/{student}/edit',   [StudentController::class, 'edit'])->name('students.edit');
        Route::put('/students/{student}',        [StudentController::class, 'update'])->name('students.update');
        Route::delete('/students/{student}',     [StudentController::class, 'destroy'])->name('students.destroy');

        // Lecturer CRUD
        Route::resource('lecturers', LecturerController::class);

        // Course CRUD (create/edit/delete)
        Route::get('/courses/create',           [CourseController::class, 'create'])->name('courses.create');
        Route::post('/courses',                 [CourseController::class, 'store'])->name('courses.store');
        Route::get('/courses/{course}/edit',    [CourseController::class, 'edit'])->name('courses.edit');
        Route::put('/courses/{course}',         [CourseController::class, 'update'])->name('courses.update');
        Route::delete('/courses/{course}',      [CourseController::class, 'destroy'])->name('courses.destroy');

        // Registrations admin
        Route::post('/registrations/admin',                     [RegistrationController::class, 'adminStore'])->name('registrations.adminStore');

        // Announcements CRUD
        Route::get('/announcements/create',               [AnnouncementController::class, 'create'])->name('announcements.create');
        Route::post('/announcements',                     [AnnouncementController::class, 'store'])->name('announcements.store');
        Route::get('/announcements/{announcement}/edit',  [AnnouncementController::class, 'edit'])->name('announcements.edit');
        Route::put('/announcements/{announcement}',       [AnnouncementController::class, 'update'])->name('announcements.update');
        Route::delete('/announcements/{announcement}',    [AnnouncementController::class, 'destroy'])->name('announcements.destroy');

        // Events CRUD
        Route::get('/events/create',        [EventController::class, 'create'])->name('events.create');
        Route::post('/events',              [EventController::class, 'store'])->name('events.store');
        Route::get('/events/{event}/edit',  [EventController::class, 'edit'])->name('events.edit');
        Route::put('/events/{event}',       [EventController::class, 'update'])->name('events.update');
        Route::delete('/events/{event}',    [EventController::class, 'destroy'])->name('events.destroy');
    });

    // ── Lecturer ──────────────────────────────────────────────────────────────
    Route::middleware('role:lecturer')->group(function () {
        Route::get('/lecturer/dashboard', [LecturerController::class, 'dashboard'])->name('lecturer.dashboard');
    });

    // ── Student ───────────────────────────────────────────────────────────────
    Route::middleware('role:student')->group(function () {
        Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
        Route::get('/registrations/create', [RegistrationController::class, 'create'])->name('registrations.create');
        Route::post('/registrations', [RegistrationController::class, 'store'])->name('registrations.store');
    });
});
