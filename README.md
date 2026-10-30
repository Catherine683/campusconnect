# CampusConnect

A Laravel student management system for Makerere University Business School. CampusConnect brings student, lecturer, course, and course-registration management into one role-based application.

**Course:** Advanced Web Application Development (BUC3131)

**Academic year:** 2026/2027

**Repository:** [Catherine683/campusconnect](https://github.com/Catherine683/campusconnect)

## What the application does

- Administrators manage students, lecturers, courses, registrations, announcements, and events.
- Lecturers view their assigned courses and registered students.
- Students browse courses, register for courses, view their registrations, and manage their profiles.
- Role-based access is implemented with Laravel authentication and Spatie Laravel Permission.

## Built with

- PHP 8.2+
- Laravel 12
- MySQL (configured by default; SQLite can also be configured)
- Spatie Laravel Permission 6
- Node.js, npm, and Vite

## Get started

### Requirements

Install PHP 8.2 or newer, Composer, Node.js/npm, and MySQL. Create a MySQL database for the application, for example `campusconnect`.

### Installation

From the project directory, run:

```bash
composer install
npm install
```

Create your local environment file:

```bash
cp .env.example .env
```

On Windows PowerShell, use:

```powershell
Copy-Item .env.example .env
```

Update the database settings in `.env` to match your local MySQL setup:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=campusconnect
DB_USERNAME=root
DB_PASSWORD=
```

For SQLite instead, set `DB_CONNECTION=sqlite` and `DB_DATABASE=database/database.sqlite` in `.env`, then create the empty database file before migrating:

```powershell
New-Item -ItemType File -Path database\database.sqlite -Force
```

Then generate the application key, create the tables and demo data, and build the frontend:

```bash
php artisan key:generate
php artisan migrate --seed
npm run build
```

Start the application:

```bash
php artisan serve
```

Open [http://localhost:8000](http://localhost:8000).

The database seeder creates demo users, roles, courses, registrations, announcements, and events. To reset a local development database and reseed it, run `php artisan migrate:fresh --seed`. **This deletes existing database data; do not use it on a database you need to keep.**

## Demo accounts

These accounts are created by the seeders. The demo password for each account is `password`.

| Role | Email |
|---|---|
| Administrator | `admin@campusconnect.ac.ug` |
| Lecturer | `j.mukasa@campusconnect.ac.ug` |
| Lecturer | `s.namutebi@campusconnect.ac.ug` |
| Lecturer | `p.otieno@campusconnect.ac.ug` |
| Student | `alice.nakato@std.campusconnect.ac.ug` |
| Student | `brian.ssemwogerere@std.campusconnect.ac.ug` |
| Student | `carol.atim@std.campusconnect.ac.ug` |
| Student | `david.ouma@std.campusconnect.ac.ug` |
| Student | `eva.namukasa@std.campusconnect.ac.ug` |
| Student | `frank.mugisha@std.campusconnect.ac.ug` |

These credentials are for local coursework demonstrations only. Change or remove them before deploying the application anywhere public.

## Roles

### Administrator

Manages student, lecturer, and course records; manages registrations, announcements, events, and application access.

### Lecturer

Views assigned courses and their registered students, and can view announcements and events.

### Student

Views courses, registers for courses, views their own registrations, and can read announcements and events.

## Data model

The main academic records are students, lecturers, courses, and course registrations. A registration connects one student to one course and stores registration details such as status and grade.

- A student has many course registrations and can belong to many courses.
- A course has many registrations and can belong to many students.
- A lecturer has many courses; each course belongs to a lecturer.
- A course registration belongs to one student and one course.

## Screenshots

These screenshots show the running application:

| Home page | Login |
|---|---|
| ![CampusConnect home page](screenshots/Screenshot%202026-10-30%20153610.png) | ![CampusConnect login page](screenshots/Screenshot%202026-10-30%20153716.png) |

| Student dashboard | Course listing |
|---|---|
| ![Student dashboard](screenshots/Screenshot%202026-10-30%20153336.png) | ![Course listing empty state](screenshots/Screenshot%202026-10-30%20153457.png) |

## Run tests

Run the Laravel test suite with:

```bash
php artisan test
```

## GitHub collaboration

The coursework asks the group to use `main` for stable code and `develop` for integration. Each member should work on their own `feature/<task>` branch, push it to GitHub, and open a pull request to `develop` for review before integration.

See [CONTRIBUTION_REPORT.md](CONTRIBUTION_REPORT.md) for the group contribution report. Fill it in with the real member names, tasks, branch names, PR links, reviews, and testing details before submission.

## Main project folders

```text
app/                 Application models and controllers
database/migrations/ Database schema
database/seeders/    Roles and demonstration data
resources/views/     Blade templates
routes/web.php       Web routes
screenshots/         Application screenshots
tests/               Automated tests
```
