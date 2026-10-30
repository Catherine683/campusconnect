<?php

use App\Models\Course;
use App\Models\CourseRegistration;
use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed();
});

test('students can only view their own profile and cannot browse the student directory', function () {
    $studentUser = User::where('email', 'alice.nakato@std.campusconnect.ac.ug')->firstOrFail();
    $otherStudent = Student::where('student_number', 'MUBS/BCS/2024/002')->firstOrFail();

    $this->actingAs($studentUser)
        ->get(route('students.index'))
        ->assertForbidden();

    $this->get(route('students.show', $studentUser->student))
        ->assertOk();

    $this->get(route('students.show', $otherStudent))
        ->assertForbidden();
});

test('students can view course details without seeing the course roster', function () {
    $studentUser = User::where('email', 'alice.nakato@std.campusconnect.ac.ug')->firstOrFail();
    $course = Course::where('course_code', 'BUC3131')->firstOrFail();

    $this->actingAs($studentUser)
        ->get(route('courses.show', $course))
        ->assertOk()
        ->assertDontSee('Brian Ssemwogerere');
});

test('lecturers only see students and rosters for their assigned courses', function () {
    $lecturerUser = User::where('email', 'j.mukasa@campusconnect.ac.ug')->firstOrFail();
    $assignedCourse = Course::where('course_code', 'BUC3131')->firstOrFail();
    $otherLecturerCourse = Course::where('course_code', 'BUC3120')->firstOrFail();
    $assignedStudent = Student::where('student_number', 'MUBS/BCS/2024/001')->firstOrFail();
    $otherStudent = Student::where('student_number', 'MUBS/BCS/2024/003')->firstOrFail();

    $this->actingAs($lecturerUser)
        ->get(route('students.index'))
        ->assertOk()
        ->assertSee('Alice Nakato')
        ->assertDontSee('Carol Atim');

    $this->get(route('students.show', $assignedStudent))
        ->assertOk()
        ->assertDontSee('BUC3120');

    $this->get(route('students.show', $otherStudent))
        ->assertForbidden();

    $this->get(route('courses.show', $assignedCourse))
        ->assertOk()
        ->assertSee('Alice Nakato');

    $this->get(route('courses.show', $otherLecturerCourse))
        ->assertForbidden();
});

test('admins can remove registrations while students cannot remove another student registration', function () {
    $admin = User::where('email', 'admin@campusconnect.ac.ug')->firstOrFail();
    $lecturer = User::where('email', 'j.mukasa@campusconnect.ac.ug')->firstOrFail();
    $studentUser = User::where('email', 'alice.nakato@std.campusconnect.ac.ug')->firstOrFail();
    $registration = CourseRegistration::whereHas('student', function ($query) {
        $query->where('student_number', 'MUBS/BCS/2024/002');
    })->firstOrFail();
    $ownRegistration = CourseRegistration::whereHas('student', function ($query) {
        $query->where('student_number', 'MUBS/BCS/2024/001');
    })->whereHas('course', function ($query) {
        $query->where('course_code', 'BUC3131');
    })->firstOrFail();

    $this->actingAs($lecturer)
        ->delete(route('registrations.destroy', $registration))
        ->assertForbidden();

    $this->actingAs($studentUser)
        ->delete(route('registrations.destroy', $registration))
        ->assertForbidden();

    $this->assertDatabaseHas('course_registrations', ['id' => $registration->id]);

    $this->actingAs($admin)
        ->delete(route('registrations.destroy', $registration))
        ->assertRedirect(route('registrations.index'));

    $this->assertDatabaseMissing('course_registrations', ['id' => $registration->id]);

    $this->actingAs($studentUser)
        ->delete(route('registrations.destroy', $ownRegistration))
        ->assertRedirect(route('registrations.index'));

    $this->assertDatabaseMissing('course_registrations', ['id' => $ownRegistration->id]);
});
