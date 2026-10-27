<?php

namespace Database\Seeders;

use App\Models\Lecturer;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@campusconnect.ac.ug'],
            [
                'name' => 'System Administrator',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );
        $admin->syncRoles(['admin']);

        // Lecturers
        $lecturersData = [
            [
                'name' => 'Dr. James Mukasa',
                'email' => 'j.mukasa@campusconnect.ac.ug',
                'staff_number' => 'MUBS/STAFF/001',
                'first_name' => 'James',
                'last_name' => 'Mukasa',
                'department' => 'Computer Science',
                'specialization' => 'Web Development',
                'phone' => '+256701234567',
            ],
            [
                'name' => 'Prof. Sarah Namutebi',
                'email' => 's.namutebi@campusconnect.ac.ug',
                'staff_number' => 'MUBS/STAFF/002',
                'first_name' => 'Sarah',
                'last_name' => 'Namutebi',
                'department' => 'Information Systems',
                'specialization' => 'Database Systems',
                'phone' => '+256702345678',
            ],
            [
                'name' => 'Mr. Peter Otieno',
                'email' => 'p.otieno@campusconnect.ac.ug',
                'staff_number' => 'MUBS/STAFF/003',
                'first_name' => 'Peter',
                'last_name' => 'Otieno',
                'department' => 'Business Computing',
                'specialization' => 'Software Engineering',
                'phone' => '+256703456789',
            ],
        ];

        foreach ($lecturersData as $data) {
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => Hash::make('password'),
                    'role' => 'lecturer',
                ]
            );
            $user->syncRoles(['lecturer']);

            Lecturer::firstOrCreate(
                ['email' => $data['email']],
                [
                    'user_id' => $user->id,
                    'staff_number' => $data['staff_number'],
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'phone' => $data['phone'],
                    'department' => $data['department'],
                    'specialization' => $data['specialization'],
                ]
            );
        }

        // Students
        $studentsData = [
            [
                'name' => 'Alice Nakato',
                'email' => 'alice.nakato@std.campusconnect.ac.ug',
                'student_number' => 'MUBS/BCS/2024/001',
                'first_name' => 'Alice',
                'last_name' => 'Nakato',
                'gender' => 'Female',
                'program' => 'Bachelor of Business Computing',
                'year_of_study' => 3,
                'phone' => '+256704567890',
            ],
            [
                'name' => 'Brian Ssemwogerere',
                'email' => 'brian.ssemwogerere@std.campusconnect.ac.ug',
                'student_number' => 'MUBS/BCS/2024/002',
                'first_name' => 'Brian',
                'last_name' => 'Ssemwogerere',
                'gender' => 'Male',
                'program' => 'Bachelor of Business Computing',
                'year_of_study' => 3,
                'phone' => '+256705678901',
            ],
            [
                'name' => 'Carol Atim',
                'email' => 'carol.atim@std.campusconnect.ac.ug',
                'student_number' => 'MUBS/BCS/2024/003',
                'first_name' => 'Carol',
                'last_name' => 'Atim',
                'gender' => 'Female',
                'program' => 'Bachelor of Business Computing',
                'year_of_study' => 2,
                'phone' => '+256706789012',
            ],
            [
                'name' => 'David Ouma',
                'email' => 'david.ouma@std.campusconnect.ac.ug',
                'student_number' => 'MUBS/BCS/2024/004',
                'first_name' => 'David',
                'last_name' => 'Ouma',
                'gender' => 'Male',
                'program' => 'Bachelor of Business Computing',
                'year_of_study' => 1,
                'phone' => '+256707890123',
            ],
            [
                'name' => 'Eva Namukasa',
                'email' => 'eva.namukasa@std.campusconnect.ac.ug',
                'student_number' => 'MUBS/BCS/2024/005',
                'first_name' => 'Eva',
                'last_name' => 'Namukasa',
                'gender' => 'Female',
                'program' => 'Bachelor of Business Computing',
                'year_of_study' => 2,
                'phone' => '+256708901234',
            ],
            [
                'name' => 'Frank Mugisha',
                'email' => 'frank.mugisha@std.campusconnect.ac.ug',
                'student_number' => 'MUBS/BCS/2024/006',
                'first_name' => 'Frank',
                'last_name' => 'Mugisha',
                'gender' => 'Male',
                'program' => 'Bachelor of Business Computing',
                'year_of_study' => 3,
                'phone' => '+256709012345',
            ],
        ];

        foreach ($studentsData as $data) {
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => Hash::make('password'),
                    'role' => 'student',
                ]
            );
            $user->syncRoles(['student']);

            Student::firstOrCreate(
                ['email' => $data['email']],
                [
                    'user_id' => $user->id,
                    'student_number' => $data['student_number'],
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'gender' => $data['gender'],
                    'program' => $data['program'],
                    'year_of_study' => $data['year_of_study'],
                    'phone' => $data['phone'],
                    'status' => 'active',
                ]
            );
        }
    }
}
