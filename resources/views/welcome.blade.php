<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CampusConnect | Makerere University Business School</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #3730a3;
            --secondary: #06b6d4;
            --accent: #8b5cf6;
            --success: #10b981;
        }
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family:'Inter',sans-serif; background:#0f172a; color:#e2e8f0; overflow-x:hidden; }

        /* ── Navbar ── */
        nav {
            position:fixed; top:0; left:0; right:0; z-index:100;
            display:flex; align-items:center; justify-content:space-between;
            padding:16px 60px;
            background:rgba(15,23,42,.85);
            backdrop-filter:blur(12px);
            border-bottom:1px solid rgba(255,255,255,.07);
            transition:all .3s;
        }

        .nav-logo {
            display:flex; align-items:center; gap:12px;
            text-decoration:none;
        }

        .nav-logo-icon {
            width:42px; height:42px;
            background:linear-gradient(135deg,#4f46e5,#8b5cf6);
            border-radius:11px;
            display:flex; align-items:center; justify-content:center;
            font-size:20px; color:white;
            box-shadow:0 4px 12px rgba(79,70,229,.4);
        }

        .nav-logo h1 {
            font-family:'Poppins',sans-serif;
            font-size:20px; font-weight:800; color:white;
        }

        .nav-logo span { color:#818cf8; }

        .nav-links { display:flex; align-items:center; gap:8px; }

        .nav-links a {
            padding:8px 18px; border-radius:8px;
            font-size:13.5px; font-weight:500;
            text-decoration:none; color:rgba(255,255,255,.7);
            transition:all .2s;
        }

        .nav-links a:hover { color:white; background:rgba(255,255,255,.08); }

        .nav-links .btn-login {
            background:rgba(79,70,229,.2);
            color:#818cf8;
            border:1px solid rgba(79,70,229,.3);
        }

        .nav-links .btn-login:hover { background:rgba(79,70,229,.35); color:white; }

        .nav-links .btn-register {
            background:linear-gradient(135deg,#4f46e5,#7c3aed);
            color:white;
            box-shadow:0 4px 12px rgba(79,70,229,.3);
        }

        .nav-links .btn-register:hover { transform:translateY(-1px); box-shadow:0 6px 16px rgba(79,70,229,.4); }

        /* ── Hero ── */
        .hero {
            min-height:100vh;
            display:flex; align-items:center;
            padding:100px 60px 60px;
            position:relative;
            overflow:hidden;
        }

        .hero-bg {
            position:absolute; inset:0; z-index:0;
            background:linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #0f172a 100%);
        }

        /* Animated blobs */
        .blob {
            position:absolute; border-radius:50%;
            filter:blur(80px); opacity:.35;
            animation:float 8s ease-in-out infinite;
        }
        .blob-1 { width:500px; height:500px; background:#4f46e5; top:-100px; right:-100px; animation-delay:0s; }
        .blob-2 { width:400px; height:400px; background:#8b5cf6; bottom:-50px; left:-50px; animation-delay:-3s; }
        .blob-3 { width:300px; height:300px; background:#06b6d4; top:40%; left:30%; animation-delay:-6s; }

        @keyframes float {
            0%,100% { transform:translate(0,0) scale(1); }
            33%     { transform:translate(20px,-20px) scale(1.05); }
            66%     { transform:translate(-10px,15px) scale(.95); }
        }

        /* Grid overlay */
        .grid-overlay {
            position:absolute; inset:0;
            background-image:
                linear-gradient(rgba(255,255,255,.025) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,.025) 1px, transparent 1px);
            background-size:50px 50px;
        }

        .hero-content { position:relative; z-index:1; max-width:680px; }

        .hero-badge {
            display:inline-flex; align-items:center; gap:8px;
            background:rgba(79,70,229,.15);
            border:1px solid rgba(79,70,229,.3);
            padding:6px 14px; border-radius:20px;
            font-size:12.5px; color:#818cf8; font-weight:500;
            margin-bottom:24px;
        }

        .hero-badge i { font-size:11px; }

        .hero-content h2 {
            font-family:'Poppins',sans-serif;
            font-size:clamp(38px,5vw,62px);
            font-weight:900;
            line-height:1.1;
            color:white;
            margin-bottom:20px;
        }

        .hero-content h2 .gradient-text {
            background:linear-gradient(135deg,#818cf8,#a78bfa,#38bdf8);
            -webkit-background-clip:text; -webkit-text-fill-color:transparent;
            background-clip:text;
        }

        .hero-content p {
            font-size:17px; line-height:1.7;
            color:rgba(255,255,255,.6);
            margin-bottom:36px;
            max-width:560px;
        }

        .hero-cta { display:flex; gap:14px; flex-wrap:wrap; }

        .cta-btn {
            padding:14px 28px; border-radius:11px;
            font-size:15px; font-weight:700;
            text-decoration:none; display:inline-flex;
            align-items:center; gap:9px;
            transition:all .25s;
        }

        .cta-primary {
            background:linear-gradient(135deg,#4f46e5,#7c3aed);
            color:white;
            box-shadow:0 6px 20px rgba(79,70,229,.4);
        }

        .cta-primary:hover { transform:translateY(-2px); box-shadow:0 10px 28px rgba(79,70,229,.5); }

        .cta-secondary {
            background:rgba(255,255,255,.08);
            border:1px solid rgba(255,255,255,.15);
            color:white;
        }

        .cta-secondary:hover { background:rgba(255,255,255,.13); }

        .hero-stats {
            display:flex; gap:32px; margin-top:50px; flex-wrap:wrap;
        }

        .hero-stat h3 { font-size:28px; font-weight:800; color:white; }
        .hero-stat p  { font-size:12px; color:rgba(255,255,255,.5); margin-top:2px; }

        /* ── Features ── */
        .section {
            padding:90px 60px;
        }

        .section-alt { background:rgba(255,255,255,.02); }

        .section-header { text-align:center; margin-bottom:56px; }

        .section-label {
            display:inline-block;
            font-size:12px; font-weight:700;
            color:#818cf8; text-transform:uppercase;
            letter-spacing:1.2px; margin-bottom:12px;
        }

        .section-header h2 {
            font-family:'Poppins',sans-serif;
            font-size:clamp(26px,3.5vw,40px);
            font-weight:800; color:white;
            margin-bottom:14px;
        }

        .section-header p {
            font-size:16px; color:rgba(255,255,255,.5);
            max-width:560px; margin:0 auto; line-height:1.7;
        }

        .features-grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(300px,1fr)); gap:24px; }

        .feature-card {
            background:rgba(255,255,255,.04);
            border:1px solid rgba(255,255,255,.08);
            border-radius:16px; padding:28px;
            transition:all .3s;
        }

        .feature-card:hover {
            background:rgba(79,70,229,.08);
            border-color:rgba(79,70,229,.3);
            transform:translateY(-4px);
        }

        .feature-icon {
            width:52px; height:52px; border-radius:14px;
            display:flex; align-items:center; justify-content:center;
            font-size:22px; margin-bottom:18px;
        }

        .feature-card h3 { font-size:17px; font-weight:700; color:white; margin-bottom:10px; }
        .feature-card p  { font-size:14px; color:rgba(255,255,255,.5); line-height:1.6; }

        /* ── Roles ── */
        .roles-grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(280px,1fr)); gap:24px; }

        .role-card {
            border-radius:16px; padding:32px;
            transition:all .3s; position:relative; overflow:hidden;
        }

        .role-card::before {
            content:''; position:absolute; top:0; right:0;
            width:120px; height:120px; border-radius:50%;
            opacity:.08; transform:translate(30px,-30px);
        }

        .role-admin   { background:linear-gradient(135deg,rgba(79,70,229,.15),rgba(79,70,229,.05)); border:1px solid rgba(79,70,229,.25); }
        .role-lecturer{ background:linear-gradient(135deg,rgba(16,185,129,.15),rgba(16,185,129,.05)); border:1px solid rgba(16,185,129,.25); }
        .role-student { background:linear-gradient(135deg,rgba(6,182,212,.15),rgba(6,182,212,.05)); border:1px solid rgba(6,182,212,.25); }

        .role-admin::before   { background:#4f46e5; }
        .role-lecturer::before{ background:#10b981; }
        .role-student::before { background:#06b6d4; }

        .role-card:hover { transform:translateY(-4px); }

        .role-icon {
            width:54px; height:54px; border-radius:14px;
            display:flex; align-items:center; justify-content:center;
            font-size:24px; margin-bottom:18px;
        }

        .role-admin .role-icon   { background:rgba(79,70,229,.25); color:#818cf8; }
        .role-lecturer .role-icon{ background:rgba(16,185,129,.25); color:#34d399; }
        .role-student .role-icon { background:rgba(6,182,212,.25); color:#22d3ee; }

        .role-card h3 { font-size:18px; font-weight:700; color:white; margin-bottom:8px; }
        .role-card p  { font-size:13.5px; color:rgba(255,255,255,.5); margin-bottom:18px; line-height:1.6; }

        .role-features { list-style:none; }
        .role-features li {
            font-size:13px; color:rgba(255,255,255,.6);
            padding:6px 0; border-bottom:1px solid rgba(255,255,255,.05);
            display:flex; align-items:center; gap:9px;
        }
        .role-features li:last-child { border-bottom:none; }
        .role-features li i { font-size:10px; opacity:.7; }

        /* ── Footer ── */
        footer {
            background:#020817;
            border-top:1px solid rgba(255,255,255,.06);
            padding:50px 60px 30px;
        }

        .footer-grid { display:grid; grid-template-columns:2fr 1fr 1fr; gap:40px; margin-bottom:40px; }

        .footer-brand h3 {
            font-family:'Poppins',sans-serif;
            font-size:20px; font-weight:800; color:white; margin-bottom:10px;
        }

        .footer-brand p { font-size:13.5px; color:rgba(255,255,255,.4); line-height:1.7; max-width:300px; }

        .footer-col h4 { font-size:13px; font-weight:700; color:white; margin-bottom:14px; text-transform:uppercase; letter-spacing:.6px; }

        .footer-col a {
            display:block; font-size:13px; color:rgba(255,255,255,.4);
            text-decoration:none; margin-bottom:8px; transition:color .2s;
        }

        .footer-col a:hover { color:white; }

        .footer-bottom {
            border-top:1px solid rgba(255,255,255,.05);
            padding-top:24px;
            display:flex; justify-content:space-between; align-items:center;
            font-size:12.5px; color:rgba(255,255,255,.3);
        }

        @media (max-width:768px) {
            nav { padding:14px 20px; }
            .hero { padding:90px 20px 50px; }
            .section { padding:60px 20px; }
            footer { padding:40px 20px 20px; }
            .footer-grid { grid-template-columns:1fr; gap:24px; }
            .hero-stats { gap:20px; }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav>
    <a href="/" class="nav-logo">
        <div class="nav-logo-icon"><i class="fas fa-graduation-cap"></i></div>
        <h1>Campus<span>Connect</span></h1>
    </a>
    <div class="nav-links">
        @auth
            @if(auth()->user()->hasRole('admin'))
                <a href="{{ route('admin.dashboard') }}"><i class="fas fa-th-large"></i> Dashboard</a>
            @elseif(auth()->user()->hasRole('lecturer'))
                <a href="{{ route('lecturer.dashboard') }}"><i class="fas fa-th-large"></i> Dashboard</a>
            @else
                <a href="{{ route('student.dashboard') }}"><i class="fas fa-th-large"></i> Dashboard</a>
            @endif
            <form method="POST" action="{{ route('logout') }}" style="display:inline">
                @csrf
                <button type="submit" style="background:none;border:none;cursor:pointer;" class="btn-login" onclick="this.closest('form').submit()">
                    <a href="#" class="btn-login" onclick="event.preventDefault(); this.closest('form').submit();" style="text-decoration:none">Sign Out</a>
                </button>
            </form>
        @else
            <a href="{{ route('login') }}" class="btn-login">Sign In</a>
            <a href="{{ route('register') }}" class="btn-register">Get Started</a>
        @endauth
    </div>
</nav>

<!-- Hero -->
<section class="hero">
    <div class="hero-bg">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
        <div class="blob blob-3"></div>
        <div class="grid-overlay"></div>
    </div>

    <div class="hero-content">
        <div class="hero-badge">
            <i class="fas fa-star"></i>
            Academic Year 2026/2027 &bull; Semester I
        </div>

        <h2>
            Welcome to<br>
            <span class="gradient-text">CampusConnect</span>
        </h2>

        <p>
            The official Student Management System of Makerere University Business School.
            Manage courses, registrations, and academic records — all in one place.
        </p>

        <div class="hero-cta">
            @auth
                @if(auth()->user()->hasRole('admin'))
                    <a href="{{ route('admin.dashboard') }}" class="cta-btn cta-primary">
                        <i class="fas fa-th-large"></i> Go to Dashboard
                    </a>
                @elseif(auth()->user()->hasRole('lecturer'))
                    <a href="{{ route('lecturer.dashboard') }}" class="cta-btn cta-primary">
                        <i class="fas fa-th-large"></i> Go to Dashboard
                    </a>
                @else
                    <a href="{{ route('student.dashboard') }}" class="cta-btn cta-primary">
                        <i class="fas fa-th-large"></i> Go to Dashboard
                    </a>
                @endif
            @else
                <a href="{{ route('register') }}" class="cta-btn cta-primary">
                    <i class="fas fa-user-plus"></i> Create Account
                </a>
                <a href="{{ route('login') }}" class="cta-btn cta-secondary">
                    <i class="fas fa-sign-in-alt"></i> Sign In
                </a>
            @endauth
        </div>

        <div class="hero-stats">
            <div class="hero-stat">
                <h3>500+</h3>
                <p>Active Students</p>
            </div>
            <div class="hero-stat">
                <h3>40+</h3>
                <p>Courses Offered</p>
            </div>
            <div class="hero-stat">
                <h3>25+</h3>
                <p>Lecturers</p>
            </div>
            <div class="hero-stat">
                <h3>3</h3>
                <p>User Roles</p>
            </div>
        </div>
    </div>
</section>

<!-- Features -->
<section class="section">
    <div class="section-header">
        <div class="section-label"><i class="fas fa-bolt"></i> Features</div>
        <h2>Everything you need, in one platform</h2>
        <p>CampusConnect brings together students, lecturers, and administrators with a powerful, easy-to-use management system.</p>
    </div>

    <div class="features-grid">
        <div class="feature-card">
            <div class="feature-icon" style="background:rgba(79,70,229,.15); color:#818cf8;">
                <i class="fas fa-user-graduate"></i>
            </div>
            <h3>Student Management</h3>
            <p>Full CRUD operations for student records including profiles, academic programs, and year of study tracking.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon" style="background:rgba(16,185,129,.15); color:#34d399;">
                <i class="fas fa-book-open"></i>
            </div>
            <h3>Course Management</h3>
            <p>Create and manage courses, assign lecturers, track enrollment capacity, and organize by semester and year level.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon" style="background:rgba(6,182,212,.15); color:#22d3ee;">
                <i class="fas fa-clipboard-check"></i>
            </div>
            <h3>Course Registration</h3>
            <p>Students register for courses online with duplicate-prevention and capacity checks built in automatically.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon" style="background:rgba(245,158,11,.15); color:#fcd34d;">
                <i class="fas fa-shield-alt"></i>
            </div>
            <h3>Role-Based Access</h3>
            <p>Three distinct roles — Administrator, Lecturer, and Student — each with appropriate permissions and views.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon" style="background:rgba(239,68,68,.15); color:#f87171;">
                <i class="fas fa-bullhorn"></i>
            </div>
            <h3>Announcements</h3>
            <p>Administrators can post announcements targeted to all, students only, or lecturers only.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon" style="background:rgba(139,92,246,.15); color:#c4b5fd;">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <h3>Events Calendar</h3>
            <p>Keep everyone informed about upcoming academic, social, and general campus events.</p>
        </div>
    </div>
</section>

<!-- Roles -->
<section class="section section-alt">
    <div class="section-header">
        <div class="section-label"><i class="fas fa-users"></i> User Roles</div>
        <h2>Built for every campus stakeholder</h2>
        <p>Three carefully designed roles ensure each user sees exactly what they need.</p>
    </div>

    <div class="roles-grid">
        <div class="role-card role-admin">
            <div class="role-icon"><i class="fas fa-user-shield"></i></div>
            <h3>Administrator</h3>
            <p>Full control over the entire system. Manage users, courses, students, and platform settings.</p>
            <ul class="role-features">
                <li><i class="fas fa-check"></i> Manage all students & lecturers</li>
                <li><i class="fas fa-check"></i> Full course CRUD operations</li>
                <li><i class="fas fa-check"></i> Manage all registrations</li>
                <li><i class="fas fa-check"></i> Post announcements & events</li>
                <li><i class="fas fa-check"></i> Role & permission management</li>
            </ul>
        </div>

        <div class="role-card role-lecturer">
            <div class="role-icon"><i class="fas fa-chalkboard-teacher"></i></div>
            <h3>Lecturer</h3>
            <p>View assigned courses and monitor students registered in each course.</p>
            <ul class="role-features">
                <li><i class="fas fa-check"></i> View assigned courses</li>
                <li><i class="fas fa-check"></i> View registered students</li>
                <li><i class="fas fa-check"></i> View all registrations</li>
                <li><i class="fas fa-check"></i> Read announcements & events</li>
                <li><i class="fas fa-check"></i> Manage own profile</li>
            </ul>
        </div>

        <div class="role-card role-student">
            <div class="role-icon"><i class="fas fa-user-graduate"></i></div>
            <h3>Student</h3>
            <p>Register for available courses and track personal academic registrations.</p>
            <ul class="role-features">
                <li><i class="fas fa-check"></i> Browse available courses</li>
                <li><i class="fas fa-check"></i> Register for courses online</li>
                <li><i class="fas fa-check"></i> View own registrations</li>
                <li><i class="fas fa-check"></i> Read announcements & events</li>
                <li><i class="fas fa-check"></i> Manage own profile</li>
            </ul>
        </div>
    </div>
</section>

<!-- Footer -->
<footer>
    <div class="footer-grid">
        <div class="footer-brand">
            <h3>CampusConnect</h3>
            <p>The Student Management System for Makerere University Business School. Developed as part of BUC3131 — Advanced Web Application Development.</p>
        </div>
        <div class="footer-col">
            <h4>Quick Links</h4>
            <a href="{{ route('login') }}">Sign In</a>
            <a href="{{ route('register') }}">Create Account</a>
            @auth
                <a href="{{ route('announcements.index') }}">Announcements</a>
                <a href="{{ route('events.index') }}">Events</a>
            @endauth
        </div>
        <div class="footer-col">
            <h4>Resources</h4>
            <a href="#">User Guide</a>
            <a href="#">Academic Calendar</a>
            <a href="#">Course Catalog</a>
            <a href="#">Support</a>
        </div>
    </div>
    <div class="footer-bottom">
        <span>&copy; {{ date('Y') }} CampusConnect &mdash; Makerere University Business School</span>
        <span>BUC3131 &bull; Advanced Web Application Development &bull; 2026/2027</span>
    </div>
</footer>

</body>
</html>
