<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;

class AnnouncementEventSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@campusconnect.ac.ug')->first();

        if (!$admin) return;

        $announcements = [
            [
                'title' => 'Welcome to CampusConnect',
                'content' => 'Welcome to the new CampusConnect Student Management System. This platform will be used for course registrations, announcements, and academic management throughout the semester.',
                'audience' => 'all',
            ],
            [
                'title' => 'Semester I Registration Deadline',
                'content' => 'All students are reminded that the deadline for Semester I course registration is November 15, 2026. Late registrations will attract a penalty fee.',
                'audience' => 'students',
            ],
            [
                'title' => 'Lecturer Meeting - Academic Calendar',
                'content' => 'All lecturers are required to attend the academic calendar review meeting scheduled for November 5, 2026 at 10:00 AM in the Main Conference Room.',
                'audience' => 'lecturers',
            ],
            [
                'title' => 'Library Extended Hours',
                'content' => 'The university library will be open until midnight during the examination preparation period from November 20-30, 2026.',
                'audience' => 'all',
            ],
        ];

        foreach ($announcements as $announcement) {
            Announcement::firstOrCreate(
                ['title' => $announcement['title']],
                array_merge($announcement, ['user_id' => $admin->id])
            );
        }

        $events = [
            [
                'title' => 'Freshers\' Welcome Party',
                'description' => 'Join us to welcome the new first-year students to Makerere University Business School.',
                'location' => 'MUBS Main Hall',
                'event_date' => '2026-11-10 14:00:00',
                'type' => 'social',
            ],
            [
                'title' => 'Career Fair 2026',
                'description' => 'Annual career fair featuring top employers from various industries. Bring your CV!',
                'location' => 'MUBS Grounds',
                'event_date' => '2026-11-20 08:00:00',
                'type' => 'academic',
            ],
            [
                'title' => 'End of Semester Exams Begin',
                'description' => 'Semester I examinations commence. Check the timetable on the notice board.',
                'location' => 'Various Exam Halls',
                'event_date' => '2026-12-01 08:00:00',
                'type' => 'academic',
            ],
            [
                'title' => 'Sports Day',
                'description' => 'Annual inter-department sports competition. Register your team with the sports department.',
                'location' => 'MUBS Sports Grounds',
                'event_date' => '2026-11-15 09:00:00',
                'type' => 'social',
            ],
        ];

        foreach ($events as $event) {
            Event::firstOrCreate(
                ['title' => $event['title']],
                array_merge($event, ['user_id' => $admin->id])
            );
        }
    }
}
