<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseRegistration;
use App\Models\Student;
use Illuminate\Database\Seeder;

class CourseRegistrationSeeder extends Seeder
{
    public function run(): void
    {
        $students = Student::all();
        $courses = Course::all();

        // Sample registrations - firstOrCreate prevents duplicates
        $registrations = [
            ['MUBS/BCS/2024/001', 'BUC3131'],
            ['MUBS/BCS/2024/001', 'BUC3120'],
            ['MUBS/BCS/2024/001', 'BUC3115'],
            ['MUBS/BCS/2024/002', 'BUC3131'],
            ['MUBS/BCS/2024/002', 'BUC3120'],
            ['MUBS/BCS/2024/002', 'BUC2110'],
            ['MUBS/BCS/2024/003', 'BUC2110'],
            ['MUBS/BCS/2024/003', 'BUC2105'],
            ['MUBS/BCS/2024/004', 'BUC1101'],
            ['MUBS/BCS/2024/005', 'BUC2110'],
            ['MUBS/BCS/2024/005', 'BUC2105'],
            ['MUBS/BCS/2024/006', 'BUC3131'],
            ['MUBS/BCS/2024/006', 'BUC3115'],
        ];

        foreach ($registrations as [$studentNo, $courseCode]) {
            $student = Student::where('student_number', $studentNo)->first();
            $course = Course::where('course_code', $courseCode)->first();

            if ($student && $course) {
                CourseRegistration::firstOrCreate(
                    [
                        'student_id' => $student->id,
                        'course_id' => $course->id,
                    ],
                    ['status' => 'registered']
                );
            }
        }
    }
}
