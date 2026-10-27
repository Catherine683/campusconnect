<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'KampusKonnect') | Makerere University Business School</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        :root {
            --primary: #2d5a4e;
            --primary-dark: #1e4034;
            --primary-light: #3d7a6a;
            --secondary: #8ab89e;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --info: #3b82f6;
            --cream: #f5f0e8;
            --cream-light: #faf7f2;
            --cream-mid: #ede8df;
            --sidebar-width: 260px;
            --navbar-height: 65px;
            --radius: 12px;
            --shadow: 0 4px 6px -1px rgba(0,0,0,.07), 0 2px 4px -2px rgba(0,0,0,.05);
            --shadow-lg: 0 10px 15px -3px rgba(0,0,0,.1), 0 4px 6px -4px rgba(0,0,0,.05);
            --gray-50: #f8faf9;
            --gray-100: #f1f5f3;
            --gray-200: #e2ebe6;
            --gray-300: #c8d8d0;
            --gray-400: #8aab9e;
            --gray-500: #5a7a6e;
            --gray-600: #3a5a4e;
            --gray-700: #2a4038;
            --gray-800: #1e3028;
            --gray-900: #121e18;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--cream-light);
            color: var(--gray-800);
            min-height: 100vh;
        }

        /* ── Sidebar ── */
        .sidebar {
            position: fixed;
            top: 0; left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: linear-gradient(180deg, #1e4034 0%, #2d5a4e 55%, #3d7a6a 100%);
            display: flex;
            flex-direction: column;
            z-index: 1000;
            transition: transform .3s ease;
            overflow-y: auto;
        }

        .sidebar::-webkit-scrollbar { width: 4px; }
        .sidebar::-webkit-scrollbar-track { background: transparent; }
        .sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,.2); border-radius: 2px; }

        .sidebar-logo {
            padding: 20px 24px 16px;
            border-bottom: 1px solid rgba(255,255,255,.1);
        }

        .sidebar-logo .logo-icon {
            width: 44px; height: 44px;
            background: linear-gradient(135deg, #6b7c5c, #8a9e7a);
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 22px; color: #f5f0e8; margin-bottom: 8px;
            box-shadow: 0 4px 12px rgba(107,124,92,.45);
        }

        .sidebar-logo h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 17px; font-weight: 700;
            color: white; line-height: 1.2;
        }

        .sidebar-logo p {
            font-size: 11px; color: rgba(255,255,255,.55);
            margin-top: 2px;
        }

        .sidebar-user {
            padding: 16px 20px;
            display: flex; align-items: center; gap: 12px;
            border-bottom: 1px solid rgba(255,255,255,.08);
        }

        .sidebar-user img, .sidebar-user .user-avatar {
            width: 38px; height: 38px; border-radius: 50%;
            object-fit: cover;
            border: 2px solid rgba(255,255,255,.3);
        }

        .sidebar-user .user-avatar {
            background: linear-gradient(135deg, #2d5a4e, #3d7a6a);
            display: flex; align-items: center; justify-content: center;
            color: #f5f0e8; font-weight: 700; font-size: 14px;
        }

        .sidebar-user .user-info h4 {
            font-size: 13px; font-weight: 600; color: white;
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
            max-width: 150px;
        }

        .sidebar-user .user-info span {
            font-size: 11px; color: rgba(255,255,255,.5);
        }

        .sidebar-nav { flex: 1; padding: 12px 0; }

        .nav-section-label {
            font-size: 10px; font-weight: 700;
            color: rgba(255,255,255,.4);
            text-transform: uppercase; letter-spacing: .8px;
            padding: 10px 24px 4px;
        }

        .nav-item {
            display: flex; align-items: center; gap: 12px;
            padding: 10px 20px;
            color: rgba(255,255,255,.7);
            text-decoration: none;
            font-size: 13.5px; font-weight: 500;
            border-radius: 8px;
            margin: 2px 10px;
            transition: all .2s ease;
            position: relative;
        }

        .nav-item:hover {
            background: rgba(255,255,255,.1);
            color: white;
            transform: translateX(2px);
        }

        .nav-item.active {
            background: rgba(255,255,255,.15);
            color: white;
            box-shadow: 0 2px 8px rgba(0,0,0,.2);
        }

        .nav-item.active::before {
            content: '';
            position: absolute; left: 0; top: 50%;
            transform: translateY(-50%);
            width: 3px; height: 20px;
            background: #a8d5b5;
            border-radius: 0 3px 3px 0;
            margin-left: -10px;
        }

        .nav-item i { width: 18px; text-align: center; font-size: 14px; }

        .sidebar-footer {
            padding: 16px 20px;
            border-top: 1px solid rgba(245,240,232,.12);
        }

        .sidebar-footer form button {
            display: flex; align-items: center; gap: 10px;
            color: var(--cream);
            background: rgba(239,68,68,.12);
            border: 1px solid rgba(239,68,68,.2);
            cursor: pointer;
            font-size: 13px; font-weight: 600;
            padding: 10px 16px; border-radius: 10px;
            width: 100%; transition: all .2s;
            font-family: inherit;
        }

        .sidebar-footer form button:hover {
            background: rgba(239,68,68,.28);
            border-color: rgba(239,68,68,.4);
            color: #fca5a5;
            transform: translateX(2px);
        }
        }

        /* ── Topbar ── */
        .topbar {
            position: fixed;
            top: 0;
            left: var(--sidebar-width);
            right: 0;
            height: var(--navbar-height);
            background: var(--cream);
            border-bottom: 1px solid var(--cream-mid);
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 28px;
            z-index: 900;
            box-shadow: 0 1px 3px rgba(0,0,0,.05);
        }

        .topbar-left { display: flex; align-items: center; gap: 16px; }

        .page-title {
            font-size: 18px; font-weight: 700;
            color: var(--gray-900);
            font-family: 'Poppins', sans-serif;
        }

        .breadcrumb {
            font-size: 12px; color: var(--gray-400);
            display: flex; align-items: center; gap: 6px;
        }

        .topbar-right { display: flex; align-items: center; gap: 16px; }

        .topbar-btn {
            width: 38px; height: 38px;
            background: var(--gray-100);
            border: none; border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer; color: var(--gray-600);
            font-size: 15px; transition: all .2s;
            text-decoration: none;
            position: relative;
        }

        .topbar-btn:hover { background: var(--cream-mid); color: var(--primary); }

        .topbar-user {
            display: flex; align-items: center; gap: 10px;
            text-decoration: none; color: inherit;
        }

        .topbar-user img, .topbar-user .user-avatar-sm {
            width: 36px; height: 36px; border-radius: 10px;
            object-fit: cover;
        }

        .topbar-user .user-avatar-sm {
            background: linear-gradient(135deg, #2d5a4e, #3d7a6a);
            display: flex; align-items: center; justify-content: center;
            color: #f5f0e8; font-size: 13px; font-weight: 700;
        }

        .topbar-user-name {
            font-size: 13px; font-weight: 600;
            color: var(--gray-700);
        }

        /* ── Main Content ── */
        .main-content {
            margin-left: var(--sidebar-width);
            margin-top: var(--navbar-height);
            padding: 28px;
            min-height: calc(100vh - var(--navbar-height));
        }

        /* ── Cards ── */
        .card {
            background: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            border: 1px solid var(--gray-200);
        }

        .card-header {
            padding: 18px 22px;
            border-bottom: 1px solid var(--gray-100);
            display: flex; align-items: center; justify-content: space-between;
        }

        .card-title {
            font-size: 15px; font-weight: 700;
            color: var(--gray-800);
        }

        .card-body { padding: 22px; }

        /* ── Stat Cards ── */
        .stat-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 28px; }

        .stat-card {
            background: white;
            border-radius: var(--radius);
            padding: 20px 22px;
            box-shadow: var(--shadow);
            border: 1px solid var(--gray-200);
            display: flex; align-items: center; gap: 16px;
            transition: transform .2s, box-shadow .2s;
        }

        .stat-card:hover { transform: translateY(-2px); box-shadow: var(--shadow-lg); }

        .stat-icon {
            width: 52px; height: 52px; border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-size: 22px; flex-shrink: 0;
        }

        .stat-icon.purple { background: #ede9fe; color: #7c3aed; }
        .stat-icon.blue   { background: #dbeafe; color: #2563eb; }
        .stat-icon.green  { background: #d1fae5; color: #059669; }
        .stat-icon.orange { background: #fef3c7; color: #d97706; }
        .stat-icon.pink   { background: #fce7f3; color: #db2777; }
        .stat-icon.cyan   { background: #cffafe; color: #0891b2; }

        .stat-info h3 { font-size: 28px; font-weight: 800; color: var(--gray-900); line-height: 1; }
        .stat-info p  { font-size: 12.5px; color: var(--gray-500); margin-top: 3px; }

        /* ── Buttons ── */
        .btn {
            display: inline-flex; align-items: center; gap: 7px;
            padding: 9px 18px;
            border-radius: 9px;
            font-size: 13.5px; font-weight: 600;
            border: none; cursor: pointer;
            transition: all .2s;
            text-decoration: none;
        }

        .btn-primary   { background: var(--primary); color: white; }
        .btn-primary:hover   { background: var(--primary-dark); transform: translateY(-1px); box-shadow: 0 4px 12px rgba(79,70,229,.3); }
        .btn-success   { background: var(--success); color: white; }
        .btn-success:hover   { background: #059669; }
        .btn-danger    { background: var(--danger); color: white; }
        .btn-danger:hover    { background: #dc2626; }
        .btn-warning   { background: var(--warning); color: white; }
        .btn-warning:hover   { background: #d97706; }
        .btn-secondary { background: var(--gray-100); color: var(--gray-700); border: 1px solid var(--gray-200); }
        .btn-secondary:hover { background: var(--gray-200); }
        .btn-outline   { background: white; color: var(--primary); border: 1.5px solid var(--primary); }
        .btn-outline:hover   { background: var(--primary); color: white; }
        .btn-sm { padding: 6px 12px; font-size: 12px; }
        .btn-xs { padding: 4px 9px; font-size: 11px; border-radius: 6px; }

        /* ── Tables ── */
        .table-wrap { overflow-x: auto; border-radius: var(--radius); }

        table { width: 100%; border-collapse: collapse; }

        thead tr { background: var(--gray-50); }

        th {
            padding: 11px 16px;
            font-size: 11.5px; font-weight: 700;
            text-transform: uppercase; letter-spacing: .6px;
            color: var(--gray-500);
            text-align: left;
            border-bottom: 1px solid var(--gray-200);
        }

        td {
            padding: 13px 16px;
            font-size: 13.5px; color: var(--gray-700);
            border-bottom: 1px solid var(--gray-100);
            vertical-align: middle;
        }

        tbody tr:hover { background: var(--gray-50); }
        tbody tr:last-child td { border-bottom: none; }

        /* ── Badges ── */
        .badge {
            display: inline-flex; align-items: center;
            padding: 3px 10px; border-radius: 20px;
            font-size: 11px; font-weight: 600;
        }

        .badge-success { background: #d1fae5; color: #065f46; }
        .badge-danger  { background: #fee2e2; color: #991b1b; }
        .badge-warning { background: #fef3c7; color: #92400e; }
        .badge-info    { background: #dbeafe; color: #1e40af; }
        .badge-purple  { background: #ede9fe; color: #5b21b6; }
        .badge-gray    { background: var(--gray-100); color: var(--gray-600); }

        /* ── Forms ── */
        .form-group { margin-bottom: 18px; }

        .form-label {
            display: block;
            font-size: 13px; font-weight: 600;
            color: var(--gray-700); margin-bottom: 6px;
        }

        .form-control {
            width: 100%;
            padding: 10px 14px;
            border: 1.5px solid var(--gray-200);
            border-radius: 9px;
            font-size: 13.5px; font-family: inherit;
            color: var(--gray-800);
            background: white;
            transition: border-color .2s, box-shadow .2s;
            outline: none;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79,70,229,.1);
        }

        .form-control.is-invalid { border-color: var(--danger); }

        .invalid-feedback {
            font-size: 11.5px; color: var(--danger); margin-top: 4px;
        }

        .form-hint { font-size: 11.5px; color: var(--gray-400); margin-top: 4px; }

        /* ── Alerts ── */
        .alert {
            padding: 13px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 13.5px;
            display: flex; align-items: center; gap: 10px;
        }

        .alert-success { background: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; }
        .alert-danger  { background: #fee2e2; color: #991b1b; border: 1px solid #fecaca; }
        .alert-warning { background: #fef3c7; color: #92400e; border: 1px solid #fde68a; }
        .alert-info    { background: #dbeafe; color: #1e40af; border: 1px solid #bfdbfe; }

        /* ── Avatar ── */
        .avatar {
            border-radius: 50%; object-fit: cover;
            display: inline-flex; align-items: center; justify-content: center;
            font-weight: 700; color: white;
        }

        .avatar-sm  { width: 32px; height: 32px; font-size: 12px; }
        .avatar-md  { width: 42px; height: 42px; font-size: 16px; }
        .avatar-lg  { width: 64px; height: 64px; font-size: 22px; }
        .avatar-xl  { width: 80px; height: 80px; font-size: 28px; }

        /* ── Empty State ── */
        .empty-state {
            text-align: center; padding: 50px 20px; color: var(--gray-400);
        }

        .empty-state i { font-size: 48px; margin-bottom: 16px; display: block; }
        .empty-state h4 { font-size: 16px; color: var(--gray-500); margin-bottom: 8px; }
        .empty-state p  { font-size: 13px; }

        /* ── Pagination ── */
        .pagination { display: flex; gap: 6px; justify-content: center; margin-top: 20px; flex-wrap: wrap; }
        .pagination a, .pagination span {
            padding: 7px 13px; border-radius: 8px; font-size: 13px;
            text-decoration: none; color: var(--gray-600);
            border: 1px solid var(--gray-200); background: white;
            transition: all .2s;
        }
        .pagination a:hover { background: var(--primary); color: white; border-color: var(--primary); }
        .pagination .active span { background: var(--primary); color: white; border-color: var(--primary); }

        /* ── Hamburger for mobile ── */
        .menu-toggle { display: none; background: none; border: none; cursor: pointer; font-size: 22px; color: var(--gray-700); }

        .sidebar-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,.5); z-index: 999; }

        /* ── Responsive ── */
        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); }
            .sidebar-overlay.show { display: block; }
            .topbar { left: 0; }
            .main-content { margin-left: 0; padding: 20px 16px; }
            .menu-toggle { display: block; }
            .stat-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 480px) {
            .stat-grid { grid-template-columns: 1fr; }
        }

        /* ── Misc helpers ── */
        .flex-between { display: flex; align-items: center; justify-content: space-between; }
        .flex-center   { display: flex; align-items: center; justify-content: center; }
        .gap-8  { gap: 8px; }
        .gap-12 { gap: 12px; }
        .gap-16 { gap: 16px; }
        .mt-4  { margin-top: 4px; }
        .mt-8  { margin-top: 8px; }
        .mt-16 { margin-top: 16px; }
        .mt-20 { margin-top: 20px; }
        .mt-28 { margin-top: 28px; }
        .mb-20 { margin-bottom: 20px; }
        .text-muted { color: var(--gray-400); font-size: 12.5px; }
        .fw-600 { font-weight: 600; }
        .fw-700 { font-weight: 700; }
        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }

        @media (max-width: 768px) {
            .grid-2, .grid-3 { grid-template-columns: 1fr; }
        }
    </style>

    @stack('styles')
</head>
<body>

<!-- Sidebar Overlay -->
<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

<!-- Sidebar -->
<aside class="sidebar" id="sidebar">
    <!-- Logo -->
    <div class="sidebar-logo">
        <a href="#" style="display:block; text-decoration:none;">
            <img src="{{ asset('images/logo.png') }}"
                 alt="KampusKonnect Logo"
                 style="width:100%; max-width:210px; height:auto; display:block; margin:0 auto;">
        </a>
        <p style="text-align:center; margin-top:6px;">Makerere University Business School</p>
    </div>

    <!-- User Info -->
    @auth
    <div class="sidebar-user">
        <div class="user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</div>
        <div class="user-info">
            <h4>{{ auth()->user()->name }}</h4>
            <span>
                @if(auth()->user()->hasRole('admin')) Administrator
                @elseif(auth()->user()->hasRole('lecturer')) Lecturer
                @else Student
                @endif
            </span>
        </div>
    </div>
    @endauth

    <!-- Navigation -->
    <nav class="sidebar-nav">
        @auth
            @if(auth()->user()->hasRole('admin'))
                <div class="nav-section-label">Main</div>
                <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-th-large"></i> Dashboard
                </a>
                <div class="nav-section-label">Management</div>
                <a href="{{ route('students.index') }}" class="nav-item {{ request()->routeIs('students.*') ? 'active' : '' }}">
                    <i class="fas fa-user-graduate"></i> Students
                </a>
                <a href="{{ route('lecturers.index') }}" class="nav-item {{ request()->routeIs('lecturers.*') ? 'active' : '' }}">
                    <i class="fas fa-chalkboard-teacher"></i> Lecturers
                </a>
                <a href="{{ route('courses.index') }}" class="nav-item {{ request()->routeIs('courses.*') ? 'active' : '' }}">
                    <i class="fas fa-book-open"></i> Courses
                </a>
                <a href="{{ route('registrations.index') }}" class="nav-item {{ request()->routeIs('registrations.*') ? 'active' : '' }}">
                    <i class="fas fa-clipboard-list"></i> Registrations
                </a>
                <div class="nav-section-label">Communication</div>
                <a href="{{ route('announcements.index') }}" class="nav-item {{ request()->routeIs('announcements.*') ? 'active' : '' }}">
                    <i class="fas fa-bullhorn"></i> Announcements
                </a>
                <a href="{{ route('events.index') }}" class="nav-item {{ request()->routeIs('events.*') ? 'active' : '' }}">
                    <i class="fas fa-calendar-alt"></i> Events
                </a>

            @elseif(auth()->user()->hasRole('lecturer'))
                <div class="nav-section-label">Main</div>
                <a href="{{ route('lecturer.dashboard') }}" class="nav-item {{ request()->routeIs('lecturer.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-th-large"></i> Dashboard
                </a>
                <div class="nav-section-label">Academic</div>
                <a href="{{ route('courses.index') }}" class="nav-item {{ request()->routeIs('courses.*') ? 'active' : '' }}">
                    <i class="fas fa-book-open"></i> My Courses
                </a>
                <a href="{{ route('students.index') }}" class="nav-item {{ request()->routeIs('students.*') ? 'active' : '' }}">
                    <i class="fas fa-user-graduate"></i> Students
                </a>
                <a href="{{ route('registrations.index') }}" class="nav-item {{ request()->routeIs('registrations.*') ? 'active' : '' }}">
                    <i class="fas fa-clipboard-list"></i> Registrations
                </a>
                <div class="nav-section-label">Communication</div>
                <a href="{{ route('announcements.index') }}" class="nav-item {{ request()->routeIs('announcements.*') ? 'active' : '' }}">
                    <i class="fas fa-bullhorn"></i> Announcements
                </a>
                <a href="{{ route('events.index') }}" class="nav-item {{ request()->routeIs('events.*') ? 'active' : '' }}">
                    <i class="fas fa-calendar-alt"></i> Events
                </a>

            @else
                <div class="nav-section-label">Main</div>
                <a href="{{ route('student.dashboard') }}" class="nav-item {{ request()->routeIs('student.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-th-large"></i> Dashboard
                </a>
                <div class="nav-section-label">Academic</div>
                <a href="{{ route('courses.index') }}" class="nav-item {{ request()->routeIs('courses.*') ? 'active' : '' }}">
                    <i class="fas fa-book-open"></i> Browse Courses
                </a>
                <a href="{{ route('registrations.index') }}" class="nav-item {{ request()->routeIs('registrations.*') ? 'active' : '' }}">
                    <i class="fas fa-clipboard-list"></i> My Registrations
                </a>
                <div class="nav-section-label">Campus</div>
                <a href="{{ route('announcements.index') }}" class="nav-item {{ request()->routeIs('announcements.*') ? 'active' : '' }}">
                    <i class="fas fa-bullhorn"></i> Announcements
                </a>
                <a href="{{ route('events.index') }}" class="nav-item {{ request()->routeIs('events.*') ? 'active' : '' }}">
                    <i class="fas fa-calendar-alt"></i> Events
                </a>
            @endif

            <div class="nav-section-label">Account</div>
            <a href="{{ route('profile.edit') }}" class="nav-item {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                <i class="fas fa-user-circle"></i> My Profile
            </a>
        @endauth
    </nav>

    <!-- Logout -->
    @auth
    <div class="sidebar-footer">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">
                <i class="fas fa-sign-out-alt"></i> Sign Out
            </button>
        </form>
    </div>
    @endauth
</aside>

<!-- Top Bar -->
<header class="topbar">
    <div class="topbar-left">
        <button class="menu-toggle" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </button>
        <div>
            <div class="page-title">@yield('page-title', 'Dashboard')</div>
            <div class="breadcrumb">
                <i class="fas fa-home" style="font-size:10px"></i>
                @yield('breadcrumb', 'Home')
            </div>
        </div>
    </div>
    <div class="topbar-right">
        <a href="{{ route('announcements.index') }}" class="topbar-btn" title="Announcements">
            <i class="fas fa-bell"></i>
        </a>
        @auth
        <a href="{{ route('profile.edit') }}" class="topbar-user">
            <div class="user-avatar-sm">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</div>
            <span class="topbar-user-name d-none d-md-inline" style="display:none;">{{ auth()->user()->name }}</span>
        </a>
        @endauth
    </div>
</header>

<!-- Main -->
<main class="main-content">

    {{-- Alerts --}}
    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle"></i>
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-triangle"></i>
            <div>
                <strong>Please fix the following errors:</strong>
                <ul style="margin-top:4px;padding-left:16px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    @yield('content')
</main>

<!-- Footer -->
<footer style="margin-left:var(--sidebar-width); padding:18px 28px; background:var(--cream); border-top:1px solid var(--cream-mid); font-size:12px; color:var(--gray-500); display:flex; justify-content:space-between; align-items:center;">
    <span>&copy; {{ date('Y') }} <strong>KampusKonnect</strong> &mdash; Makerere University Business School</span>
    <span>Advanced Web Application Development &bull; BUC3131</span>
</footer>

<script>
function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('open');
    document.getElementById('sidebarOverlay').classList.toggle('show');
}
</script>

@stack('scripts')
</body>
</html>
