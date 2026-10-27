# CampusConnect — Student Management System

**Makerere University Business School | BUC3131 – Advanced Web Application Development | 2026/2027**

---

## 📋 Project Overview

CampusConnect is a web-based Student Management System built with Laravel. It manages students, courses, lecturers, and course registrations with role-based access control.

---

## 🚀 Installation & Setup

### Prerequisites
- PHP >= 8.2
- Composer
- Node.js & npm
- SQLite (included) or MySQL

### Steps

```bash
# 1. Clone the repository
git clone <repository-url>
cd campusconnect

# 2. Install PHP dependencies
composer install

# 3. Install Node dependencies
npm install

# 4. Copy environment file
cp .env.example .env

# 5. Generate application key
php artisan key:generate

# 6. Run migrations
php artisan migrate

# 7. Seed the database
php artisan db:seed

# 8. Build front-end assets
npm run build

# 9. Start the development server
php artisan serve
```

Visit: **http://localhost:8000**

---

## 👥 User Roles & Sample Login Credentials

| Role | Email | Password |
|------|-------|----------|
| **Administrator** | admin@campusconnect.ac.ug | password |
| **Lecturer** | j.mukasa@campusconnect.ac.ug | password |
| **Lecturer** | s.namutebi@campusconnect.ac.ug | password |
| **Lecturer** | p.otieno@campusconnect.ac.ug | password |
| **Student** | alice.nakato@std.campusconnect.ac.ug | password |
| **Student** | brian.ssemwogerere@std.campusconnect.ac.ug | password |
| **Student** | carol.atim@std.campusconnect.ac.ug | password |
| **Student** | david.ouma@std.campusconnect.ac.ug | password |
| **Student** | eva.namukasa@std.campusconnect.ac.ug | password |
| **Student** | frank.mugisha@std.campusconnect.ac.ug | password |

---

## 🔐 Role Permissions

### Administrator
- Full CRUD on students, lecturers, and courses
- Manage all course registrations
- Post announcements and events
- Full system access

### Lecturer
- View assigned courses and enrolled students
- View all registrations
- Read announcements and events
- Manage own profile

### Student
- Browse and register for available courses
- View own registrations and drop courses
- Read announcements and events
- Manage own profile

---

## 🗃️ Database Structure

| Table | Description |
|-------|-------------|
| `users` | Authentication accounts for all roles |
| `students` | Student profile records |
| `lecturers` | Lecturer profile records |
| `courses` | Course catalogue |
| `course_registrations` | Student ↔ Course pivot with status |
| `announcements` | Campus announcements by audience |
| `events` | Upcoming campus events |
| `roles` / `permissions` | Spatie RBAC tables |

### Key Relationships
- `Student` belongsToMany `Course` (via `course_registrations`)
- `Course` belongsTo `Lecturer`
- `Lecturer` hasMany `Course`
- `Student` hasMany `CourseRegistration`
- `Course` hasMany `CourseRegistration`

---

## 📁 Project Structure

```
app/
├── Http/Controllers/
│   ├── AdminController.php
│   ├── AuthController.php
│   ├── CourseController.php
│   ├── LecturerController.php
│   ├── RegistrationController.php
│   ├── StudentController.php
│   ├── AnnouncementController.php
│   ├── EventController.php
│   └── ProfileController.php
├── Models/
│   ├── User.php
│   ├── Student.php
│   ├── Lecturer.php
│   ├── Course.php
│   ├── CourseRegistration.php
│   ├── Announcement.php
│   └── Event.php
database/
├── migrations/          # 8 migration files
├── seeders/             # 5 seeders
resources/views/
├── layouts/app.blade.php   # Master layout
├── welcome.blade.php        # Homepage
├── auth/                    # Login & Register
├── dashboards/              # Admin, Lecturer, Student
├── students/                # Student CRUD views
├── lecturers/               # Lecturer CRUD views
├── courses/                 # Course CRUD views
├── registrations/           # Registration views
├── announcements/           # Announcement views
├── events/                  # Event views
└── profile/                 # Profile edit view
```

---

## ⚙️ Tech Stack

- **Framework:** Laravel 12
- **Database:** SQLite (development)
- **Auth & Roles:** Spatie Laravel Permission v6
- **Frontend:** Pure CSS (custom design system, no framework)
- **Icons:** Font Awesome 6
- **Fonts:** Google Fonts (Inter, Poppins)

---

## 🌿 GitHub Workflow

```
main          ← stable production code
develop       ← integration branch
feature/*     ← individual feature branches
```

Each team member works on a feature branch and submits a PR to `develop`.
