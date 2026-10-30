<?php

use App\Models\Course;
use App\Models\CourseRegistration;
use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;

uses(RefreshDatabase::class);

beforeEach(function () {
    Role::create(['name' => 'student', 'guard_name' => 'web']);

    $this->studentUser = User::factory()->create(['role' => 'student']);
    $this->studentUser->assignRole('student');

    $this->student = Student::create([
        'user_id' => $this->studentUser->id,
        'student_number' => 'MUBS/TEST/001',
        'first_name' => 'Test',
        'last_name' => 'Student',
        'email' => $this->studentUser->email,
    ]);

    $this->course = Course::create([
        'course_code' => 'TEST1001',
        'name' => 'Test Course',
        'credit_units' => 3,
        'semester' => 'I',
        'year_level' => 1,
        'max_students' => 2,
        'status' => 'active',
    ]);
});

test('a student can register for an active course', function () {
    $response = $this->actingAs($this->studentUser)
        ->post(route('registrations.store'), ['course_id' => $this->course->id]);

    $response->assertRedirect(route('registrations.index'));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('course_registrations', [
        'student_id' => $this->student->id,
        'course_id' => $this->course->id,
        'status' => 'registered',
    ]);
});

test('a student cannot register for the same course twice', function () {
    CourseRegistration::create([
        'student_id' => $this->student->id,
        'course_id' => $this->course->id,
        'status' => 'registered',
    ]);

    $response = $this->actingAs($this->studentUser)
        ->post(route('registrations.store'), ['course_id' => $this->course->id]);

    $response->assertSessionHas('error', 'You are already registered for this course.');
    $this->assertDatabaseCount('course_registrations', 1);
});

test('a student cannot register when a course is full', function () {
    $otherUser = User::factory()->create(['role' => 'student']);
    $otherStudent = Student::create([
        'user_id' => $otherUser->id,
        'student_number' => 'MUBS/TEST/002',
        'first_name' => 'Other',
        'last_name' => 'Student',
        'email' => $otherUser->email,
    ]);

    $this->course->update(['max_students' => 1]);
    CourseRegistration::create([
        'student_id' => $otherStudent->id,
        'course_id' => $this->course->id,
        'status' => 'registered',
    ]);

    $response = $this->actingAs($this->studentUser)
        ->post(route('registrations.store'), ['course_id' => $this->course->id]);

    $response->assertSessionHas('error', 'This course is full. No more registrations accepted.');
    $this->assertDatabaseCount('course_registrations', 1);
});

test('a student cannot register for an inactive course', function () {
    $this->course->update(['status' => 'inactive']);

    $response = $this->actingAs($this->studentUser)
        ->post(route('registrations.store'), ['course_id' => $this->course->id]);

    $response->assertSessionHas('error', 'This course is not available for registration.');
    $this->assertDatabaseCount('course_registrations', 0);
});

test('a new account receives a student profile and role', function () {
    $response = $this->post(route('register'), [
        'name' => 'New Student',
        'email' => 'new.student@example.test',
        'password' => 'password123',
        'password_confirmation' => 'password123',
    ]);

    $response->assertRedirect(route('student.dashboard'));
    $this->assertAuthenticated();
    $this->assertDatabaseHas('users', ['email' => 'new.student@example.test']);
    $this->assertDatabaseHas('students', [
        'email' => 'new.student@example.test',
        'first_name' => 'New',
        'last_name' => 'Student',
    ]);
    expect(auth()->user()->hasRole('student'))->toBeTrue();
});
