<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lecturer;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $lecturer1 = Lecturer::where('staff_number', 'MUBS/STAFF/001')->first();
        $lecturer2 = Lecturer::where('staff_number', 'MUBS/STAFF/002')->first();
        $lecturer3 = Lecturer::where('staff_number', 'MUBS/STAFF/003')->first();

        $courses = [
            [
                'course_code' => 'BUC3131',
                'name' => 'Advanced Web Application Development',
                'description' => 'Advanced concepts in web development including Laravel, APIs, and modern frameworks.',
                'credit_units' => 4,
                'semester' => 'I',
                'year_level' => 3,
                'department' => 'Business Computing',
                'max_students' => 40,
                'lecturer_id' => $lecturer1?->id,
            ],
            [
                'course_code' => 'BUC3120',
                'name' => 'Database Management Systems',
                'description' => 'Advanced database design, SQL, normalization, and database administration.',
                'credit_units' => 3,
                'semester' => 'I',
                'year_level' => 3,
                'department' => 'Business Computing',
                'max_students' => 45,
                'lecturer_id' => $lecturer2?->id,
            ],
            [
                'course_code' => 'BUC2110',
                'name' => 'Object Oriented Programming',
                'description' => 'Principles of OOP using Java and Python with design patterns.',
                'credit_units' => 3,
                'semester' => 'I',
                'year_level' => 2,
                'department' => 'Business Computing',
                'max_students' => 50,
                'lecturer_id' => $lecturer3?->id,
            ],
            [
                'course_code' => 'BUC3115',
                'name' => 'Software Engineering',
                'description' => 'Software development life cycle, project management, and testing methodologies.',
                'credit_units' => 3,
                'semester' => 'II',
                'year_level' => 3,
                'department' => 'Business Computing',
                'max_students' => 40,
                'lecturer_id' => $lecturer3?->id,
            ],
            [
                'course_code' => 'BUC2105',
                'name' => 'Systems Analysis and Design',
                'description' => 'Methods and tools for analyzing and designing information systems.',
                'credit_units' => 3,
                'semester' => 'II',
                'year_level' => 2,
                'department' => 'Business Computing',
                'max_students' => 50,
                'lecturer_id' => $lecturer2?->id,
            ],
            [
                'course_code' => 'BUC1101',
                'name' => 'Introduction to Computing',
                'description' => 'Fundamentals of computer science and information technology.',
                'credit_units' => 3,
                'semester' => 'I',
                'year_level' => 1,
                'department' => 'Business Computing',
                'max_students' => 60,
                'lecturer_id' => $lecturer1?->id,
            ],
        ];

        foreach ($courses as $course) {
            Course::firstOrCreate(
                ['course_code' => $course['course_code']],
                $course
            );
        }
    }
}
