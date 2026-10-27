<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define permissions
        $permissions = [
            // Student permissions
            'view students',
            'create students',
            'edit students',
            'delete students',
            // Course permissions
            'view courses',
            'create courses',
            'edit courses',
            'delete courses',
            // Registration permissions
            'view registrations',
            'create registrations',
            'delete registrations',
            // Lecturer permissions
            'view lecturers',
            'create lecturers',
            'edit lecturers',
            'delete lecturers',
            // User permissions
            'view users',
            'create users',
            'edit users',
            'delete users',
            // Announcement & Event permissions
            'view announcements',
            'create announcements',
            'edit announcements',
            'delete announcements',
            'view events',
            'create events',
            'edit events',
            'delete events',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Create roles and assign permissions
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $adminRole->syncPermissions(Permission::all());

        $lecturerRole = Role::firstOrCreate(['name' => 'lecturer', 'guard_name' => 'web']);
        $lecturerRole->syncPermissions([
            'view students',
            'view courses',
            'view registrations',
            'view announcements',
            'view events',
        ]);

        $studentRole = Role::firstOrCreate(['name' => 'student', 'guard_name' => 'web']);
        $studentRole->syncPermissions([
            'view courses',
            'view registrations',
            'create registrations',
            'delete registrations',
            'view announcements',
            'view events',
        ]);
    }
}
