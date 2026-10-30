<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KampusKonnect | Makerere University Business School</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --green:       #1a5c38;
            --green-dark:  #0f3d24;
            --green-mid:   #2d7a52;
            --green-light: #4ade80;
            --gold:        #f59e0b;
            --gold-dark:   #d97706;
            --text:        #0f172a;
            --text-mid:    #374151;
            --text-muted:  #6b7280;
            --white:       #ffffff;
            --bg:          #f8fafc;
            --border:      #e5e7eb;
        }

        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { font-family: 'Inter', sans-serif; background: var(--white); color: var(--text); overflow-x: hidden; }

        /* ══════════════════════════════
           TOP ANNOUNCEMENT BAR
        ══════════════════════════════ */
        .topbar-announce {
            background: var(--green-dark);
            color: rgba(255,255,255,.85);
            text-align: center;
            padding: 9px 20px;
            font-size: 12.5px;
            display: flex; align-items: center; justify-content: center; gap: 10px;
        }
        .topbar-announce a {
            color: var(--gold);
            font-weight: 700;
            text-decoration: none;
            background: rgba(245,158,11,.15);
            padding: 3px 12px;
            border-radius: 20px;
            border: 1px solid rgba(245,158,11,.35);
            transition: background .2s;
        }
        .topbar-announce a:hover { background: rgba(245,158,11,.28); }

        /* ══════════════════════════════
           NAVBAR
        ══════════════════════════════ */
        nav {
            position: sticky; top: 0; z-index: 200;
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 60px;
            height: 70px;
            background: rgba(255,255,255,.97);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--border);
            box-shadow: 0 1px 12px rgba(0,0,0,.06);
        }

        .nav-logo {
            display: flex; align-items: center; gap: 11px;
            text-decoration: none;
        }
        .nav-logo img {
            height: 44px; width: auto;
        }

        .nav-links {
            display: flex; align-items: center; gap: 4px;
        }
        .nav-links a {
            padding: 8px 16px; border-radius: 8px;
            font-size: 14px; font-weight: 500;
            text-decoration: none; color: var(--text-mid);
            transition: all .2s;
        }
        .nav-links a:hover { background: #f1f5f9; color: var(--green); }

        .nav-cta-wrap { display: flex; align-items: center; gap: 10px; }

        .nav-btn-outline {
            padding: 9px 20px; border-radius: 9px;
            font-size: 13.5px; font-weight: 600;
            text-decoration: none;
            color: var(--green);
            border: 1.5px solid var(--green);
            transition: all .2s;
        }
        .nav-btn-outline:hover { background: var(--green); color: white; }

        .nav-btn-filled {
            padding: 9px 22px; border-radius: 9px;
            font-size: 13.5px; font-weight: 700;
            text-decoration: none;
            background: var(--gold);
            color: white;
            box-shadow: 0 4px 14px rgba(245,158,11,.35);
            display: inline-flex; align-items: center; gap: 7px;
            transition: all .2s;
        }
        .nav-btn-filled:hover { background: var(--gold-dark); transform: translateY(-1px); box-shadow: 0 6px 18px rgba(245,158,11,.45); }

        /* ══════════════════════════════
           HERO
        ══════════════════════════════ */
        .hero {
            min-height: calc(100vh - 104px);
            display: flex;
            align-items: center;
            padding: 70px 60px 60px;
            background:
                linear-gradient(135deg, rgba(15,61,36,.82) 0%, rgba(26,92,56,.75) 50%, rgba(15,61,36,.88) 100%),
                url('{{ env("HERO_BG_IMAGE", "https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=1600&q=80") }}')
                center center / cover no-repeat;
            position: relative;
            overflow: hidden;
        }

        /* big decorative circle */
        .hero::before {
            content: '';
            position: absolute; top: -120px; right: -120px;
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(26,92,56,.07) 0%, transparent 65%);
            border-radius: 50%; pointer-events: none;
        }
        .hero::after {
            content: '';
            position: absolute; bottom: -100px; left: 10%;
            width: 450px; height: 450px;
            background: radial-gradient(circle, rgba(245,158,11,.06) 0%, transparent 65%);
            border-radius: 50%; pointer-events: none;
        }

        .hero-left { position: relative; z-index: 1; max-width: 780px; margin: 0 auto; text-align: center; }

        .hero-desc { max-width: 600px; margin-left: auto; margin-right: auto; margin-bottom: 38px; }

        .hero-actions { justify-content: center; }

        .hero-eyebrow {
            display: inline-flex; align-items: center; gap: 8px;
            font-size: 12px; font-weight: 700; letter-spacing: 0;
            text-transform: uppercase; color: #a8d5b5;
            margin-bottom: 22px;
        }
        .hero-eyebrow::before, .hero-eyebrow::after {
            content: ''; display: inline-block;
            width: 22px; height: 2px; background: var(--gold);
        }

        .hero-heading {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: clamp(40px, 4.5vw, 68px);
            font-weight: 900;
            line-height: 1.06;
            color: #ffffff;
            margin-bottom: 24px;
            letter-spacing: 0;
            text-shadow: 0 2px 20px rgba(0,0,0,.3);
        }
        .hero-heading .line-accent {
            color: #a8d5b5;
            position: relative; display: inline-block;
        }
        .hero-heading .line-accent::after {
            content: '';
            position: absolute; bottom: 2px; left: 0; right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--gold), transparent);
            border-radius: 3px;
        }
        .hero-heading .line-gold { color: var(--gold); }

        .hero-desc {
            font-size: 17px; line-height: 1.8; color: rgba(245,240,232,.78);
            max-width: 580px; margin-bottom: 38px;
        }

        .hero-actions {
            display: flex; align-items: center; gap: 14px; flex-wrap: wrap;
            margin-bottom: 52px;
        }

        .btn-hero-primary {
            padding: 15px 32px; border-radius: 12px;
            font-size: 15px; font-weight: 700;
            background: #ffffff; color: var(--green-dark);
            text-decoration: none;
            display: inline-flex; align-items: center; gap: 9px;
            box-shadow: 0 8px 24px rgba(0,0,0,.25);
            transition: all .25s;
            border: none; cursor: pointer;
        }
        .btn-hero-primary:hover { background: var(--green-dark); transform: translateY(-2px); box-shadow: 0 12px 32px rgba(26,92,56,.38); }

        .btn-hero-secondary {
            padding: 14px 28px; border-radius: 12px;
            font-size: 15px; font-weight: 600;
            background: white; color: var(--text);
            text-decoration: none;
            display: inline-flex; align-items: center; gap: 10px;
            border: 1.5px solid var(--border);
            box-shadow: 0 2px 8px rgba(0,0,0,.05);
            transition: all .25s;
        }
        .btn-hero-secondary:hover { border-color: var(--green); color: var(--green); }

        .login-icon {
            width: 40px; height: 40px; border-radius: 50%;
            background: linear-gradient(135deg, var(--green), var(--green-mid));
            display: flex; align-items: center; justify-content: center;
            color: white; font-size: 13px; flex-shrink: 0;
            box-shadow: 0 4px 14px rgba(26,92,56,.3);
        }

        /* Trust badges */
        .hero-trust {
            display: flex; gap: 24px; flex-wrap: wrap;
        }
        .trust-item {
            display: flex; align-items: center; gap: 10px;
        }
        .trust-icon {
            width: 46px; height: 46px; border-radius: 12px;
            background: white;
            border: 1px solid var(--border);
            box-shadow: 0 2px 8px rgba(0,0,0,.06);
            display: flex; align-items: center; justify-content: center;
            font-size: 19px;
        }
        .trust-item h5 { font-size: 12.5px; font-weight: 700; color: var(--text); line-height: 1.3; }
        .trust-item p  { font-size: 11px; color: var(--text-muted); }

        /* Hero right — photo panel */
        .hero-right {
            position: relative; z-index: 1;
            display: flex; align-items: center; justify-content: center;
            padding-left: 30px;
        }

        .hero-visual {
            width: 100%; max-width: 560px; position: relative;
        }

        /* Main photo frame */
        .hero-photo-wrap {
            position: relative;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 32px 80px rgba(0,0,0,.18), 0 8px 24px rgba(0,0,0,.08);
        }

        .hero-photo-wrap img {
            width: 100%;
            height: 480px;
            object-fit: cover;
            object-position: center top;
            display: block;
        }

        /* Green gradient overlay at bottom of photo */
        .hero-photo-wrap::after {
            content: '';
            position: absolute; bottom: 0; left: 0; right: 0;
            height: 45%;
            background: linear-gradient(to top, rgba(15,61,36,.75) 0%, transparent 100%);
            pointer-events: none;
        }

        /* Caption inside photo */
        .hero-photo-caption {
            position: absolute; bottom: 22px; left: 22px; right: 22px;
            z-index: 2;
            display: flex; align-items: center; justify-content: space-between;
        }
        .hpc-badge {
            background: rgba(255,255,255,.15);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255,255,255,.25);
            border-radius: 12px;
            padding: 10px 16px;
            color: white;
            display: flex; align-items: center; gap: 9px;
            font-size: 13px; font-weight: 600;
        }
        .hpc-badge i { color: var(--gold); }
        .hpc-stat {
            background: var(--gold);
            border-radius: 12px;
            padding: 10px 18px;
            color: white;
            font-weight: 800; font-size: 15px;
            text-align: center;
            box-shadow: 0 4px 16px rgba(245,158,11,.4);
        }
        .hpc-stat span { display: block; font-size: 10px; font-weight: 500; opacity: .85; }

        /* Decorative shape behind photo */
        .hero-photo-deco {
            position: absolute;
            top: 20px; left: -20px;
            width: 100%; height: 100%;
            border-radius: 28px;
            background: linear-gradient(135deg, var(--green) 0%, var(--green-mid) 100%);
            z-index: -1;
            opacity: .35;
        }

        /* floating pills */
        .float-pill {
            position: absolute;
            background: white;
            border-radius: 50px;
            padding: 10px 16px;
            box-shadow: 0 12px 32px rgba(0,0,0,.12);
            display: flex; align-items: center; gap: 9px;
            font-size: 12.5px; font-weight: 600; color: var(--text);
            white-space: nowrap;
            z-index: 3;
        }
        .fp-dot { width: 9px; height: 9px; border-radius: 50%; flex-shrink: 0; }
        .fp-icon {
            width: 32px; height: 32px; border-radius: 9px;
            display: flex; align-items: center; justify-content: center; font-size: 15px;
        }

        .pill-tl {
            top: -16px; left: -24px;
        }
        .pill-br {
            top: 50%; right: -24px;
        }

        /* Unused old card styles — keep empty to avoid errors */
        .hc-stat, .hc-bar, .hc-pill, .hc-av, .hc-badge { display: none; }

        /* ══════════════════════════════
           STATS STRIP
        ══════════════════════════════ */
        .stats-strip {
            background: var(--green);
            padding: 28px 60px;
            display: flex; align-items: center; justify-content: space-between;
            flex-wrap: wrap; gap: 20px;
        }
        .ss-item {
            display: flex; align-items: center; gap: 14px; color: white;
        }
        .ss-item i { font-size: 26px; opacity: .7; }
        .ss-item h3 { font-size: 30px; font-weight: 900; line-height: 1; font-family: 'Playfair Display', Georgia, serif; }
        .ss-item p  { font-size: 12px; opacity: .65; margin-top: 2px; }
        .ss-divider { width: 1px; height: 44px; background: rgba(255,255,255,.2); }

        .ss-cta {
            display: inline-flex; align-items: center; gap: 8px;
            background: var(--gold); color: white;
            padding: 13px 24px; border-radius: 10px;
            font-weight: 700; font-size: 13.5px; text-decoration: none;
            box-shadow: 0 4px 16px rgba(245,158,11,.4);
            transition: all .2s;
        }
        .ss-cta:hover { background: var(--gold-dark); transform: translateY(-1px); }

        /* ══════════════════════════════
           PROGRAMS SECTION
        ══════════════════════════════ */
        .programs {
            padding: 90px 60px;
            background: white;
        }
        .section-top {
            display: flex; align-items: flex-end; justify-content: space-between;
            margin-bottom: 48px; flex-wrap: wrap; gap: 16px;
        }
        .section-label {
            font-size: 12px; font-weight: 700; letter-spacing: 0;
            text-transform: uppercase; color: var(--green);
            margin-bottom: 10px;
            display: flex; align-items: center; gap: 8px;
        }
        .section-label::before {
            content: ''; display: inline-block;
            width: 18px; height: 2.5px; background: var(--gold); border-radius: 2px;
        }
        .section-title {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: clamp(26px, 3vw, 40px); font-weight: 800;
            color: var(--text); line-height: 1.2;
        }
        .section-link {
            font-size: 13.5px; font-weight: 700; color: var(--green);
            text-decoration: none;
            display: flex; align-items: center; gap: 6px;
            white-space: nowrap;
        }
        .section-link:hover { color: var(--green-dark); }

        .programs-grid {
            display: grid; grid-template-columns: repeat(5, 1fr); gap: 16px;
        }
        .prog-card {
            border-radius: 16px; overflow: hidden;
            border: 1px solid var(--border);
            transition: all .3s; cursor: pointer;
            background: white;
        }
        .prog-card:hover { transform: translateY(-6px); box-shadow: 0 20px 40px rgba(0,0,0,.1); border-color: var(--green); }
        .prog-img {
            height: 130px;
            display: flex; align-items: center; justify-content: center;
            font-size: 42px;
            position: relative; overflow: hidden;
        }
        .prog-body { padding: 16px; }
        .prog-body h4 { font-size: 14px; font-weight: 700; color: var(--text); margin-bottom: 5px; }
        .prog-body p  { font-size: 12px; color: var(--text-muted); line-height: 1.5; }
        .prog-arrow {
            display: inline-flex; align-items: center; gap: 5px;
            font-size: 12px; font-weight: 700; color: var(--green);
            margin-top: 10px; text-decoration: none;
        }

        /* ══════════════════════════════
           ABOUT SPLIT SECTION
        ══════════════════════════════ */
        .about-split {
            display: grid; grid-template-columns: 1fr 1fr;
            background: #f0fdf4;
        }
        .about-left {
            padding: 80px 60px;
        }
        .about-left h2 {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: clamp(28px, 2.8vw, 42px); font-weight: 800;
            color: var(--text); margin-bottom: 18px; line-height: 1.2;
        }
        .about-left h2 em { font-style: normal; color: var(--green); }
        .about-left p { font-size: 15px; line-height: 1.8; color: var(--text-muted); margin-bottom: 28px; }
        .about-btn {
            display: inline-flex; align-items: center; gap: 9px;
            background: var(--green); color: white;
            padding: 13px 26px; border-radius: 10px;
            font-weight: 700; font-size: 14px; text-decoration: none;
            box-shadow: 0 6px 20px rgba(26,92,56,.28);
            transition: all .2s;
        }
        .about-btn:hover { background: var(--green-dark); transform: translateY(-1px); }

        .about-right {
            background: linear-gradient(135deg, var(--green-dark), var(--green));
            padding: 60px 50px;
            display: flex; flex-direction: column; justify-content: center; gap: 14px;
        }
        .about-feature {
            background: rgba(255,255,255,.1);
            border: 1px solid rgba(255,255,255,.15);
            backdrop-filter: blur(8px);
            border-radius: 14px; padding: 16px 20px;
            display: flex; align-items: center; gap: 14px;
            transition: background .2s;
        }
        .about-feature:hover { background: rgba(255,255,255,.16); }
        .af-icon {
            width: 42px; height: 42px; border-radius: 11px;
            background: rgba(255,255,255,.15);
            display: flex; align-items: center; justify-content: center;
            font-size: 18px; color: white; flex-shrink: 0;
        }
        .about-feature h4 { font-size: 14px; font-weight: 700; color: white; }
        .about-feature p  { font-size: 12px; color: rgba(255,255,255,.6); margin-top: 2px; }

        /* ══════════════════════════════
           ADMISSIONS BANNER
        ══════════════════════════════ */
        .admissions {
            background: var(--green-dark);
            padding: 70px 60px;
            display: grid; grid-template-columns: 1fr auto;
            align-items: center; gap: 40px;
            position: relative; overflow: hidden;
        }
        .admissions::before {
            content: ''; position: absolute; right: -80px; top: -80px;
            width: 320px; height: 320px;
            border-radius: 50%;
            background: rgba(255,255,255,.04);
        }
        .admissions::after {
            content: ''; position: absolute; left: 40%; bottom: -60px;
            width: 220px; height: 220px;
            border-radius: 50%;
            background: rgba(245,158,11,.07);
        }
        .admissions-label {
            font-size: 11px; font-weight: 700; letter-spacing: 0;
            text-transform: uppercase; color: var(--gold);
            margin-bottom: 12px;
        }
        .admissions h2 {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: clamp(28px, 3vw, 44px); font-weight: 900;
            color: white; line-height: 1.15; margin-bottom: 14px;
        }
        .admissions p { font-size: 15px; color: rgba(255,255,255,.6); }
        .admissions-actions {
            display: flex; flex-direction: column; gap: 12px; align-items: flex-start; min-width: 200px;
        }
        .adm-item {
            display: flex; align-items: center; gap: 10px;
            color: rgba(255,255,255,.75); font-size: 13.5px;
        }
        .adm-item i { color: var(--gold); font-size: 14px; }
        .adm-btn {
            margin-top: 6px;
            display: inline-flex; align-items: center; gap: 8px;
            background: var(--gold); color: white;
            padding: 13px 26px; border-radius: 10px;
            font-weight: 700; font-size: 14px; text-decoration: none;
            box-shadow: 0 6px 20px rgba(245,158,11,.4);
            transition: all .2s;
        }
        .adm-btn:hover { background: var(--gold-dark); transform: translateY(-1px); }

        /* ══════════════════════════════
           TESTIMONIALS
        ══════════════════════════════ */
        .testimonials {
            padding: 90px 60px;
            background: white;
        }
        .testi-grid {
            display: grid; grid-template-columns: repeat(3,1fr); gap: 24px;
            margin-top: 48px;
        }
        .testi-card {
            border: 1px solid var(--border); border-radius: 20px; padding: 28px;
            transition: all .3s;
            position: relative;
        }
        .testi-card:hover { box-shadow: 0 16px 40px rgba(0,0,0,.08); transform: translateY(-4px); border-color: var(--green); }
        .testi-stars { color: var(--gold); font-size: 14px; margin-bottom: 14px; letter-spacing: 0; }
        .testi-card p { font-size: 14px; line-height: 1.75; color: var(--text-muted); margin-bottom: 20px; font-style: italic; }
        .testi-person { display: flex; align-items: center; gap: 12px; }
        .testi-avatar {
            width: 44px; height: 44px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 16px; font-weight: 800; color: white; flex-shrink: 0;
        }
        .testi-person h5 { font-size: 14px; font-weight: 700; color: var(--text); }
        .testi-person span { font-size: 12px; color: var(--text-muted); }
        .testi-quote {
            position: absolute; top: 20px; right: 24px;
            font-size: 48px; color: #f0fdf4;
            font-family: Georgia, serif; line-height: 1;
        }

        /* ══════════════════════════════
           FOOTER
        ══════════════════════════════ */
        footer {
            background: #0a1f14;
            padding: 60px 60px 28px;
        }
        .footer-grid {
            display: grid; grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 48px; margin-bottom: 48px;
        }
        .footer-brand { }
        .footer-brand .fb-logo {
            display: flex; align-items: center; gap: 10px; margin-bottom: 16px;
        }
        .fb-logo img { display: block; width: 160px; max-width: 100%; height: auto; }
        .footer-brand p { font-size: 13px; color: #64748b; line-height: 1.7; max-width: 270px; margin-bottom: 20px; }
        .footer-socials { display: flex; gap: 10px; }
        .footer-socials a {
            width: 36px; height: 36px; border-radius: 9px;
            background: rgba(255,255,255,.07); border: 1px solid rgba(255,255,255,.1);
            display: flex; align-items: center; justify-content: center;
            color: #94a3b8; font-size: 14px; text-decoration: none;
            transition: all .2s;
        }
        .footer-socials a:hover { background: var(--green); color: white; border-color: var(--green); }

        .footer-col h4 {
            font-size: 12px; font-weight: 700; color: white;
            text-transform: uppercase; letter-spacing: 0;
            margin-bottom: 18px;
        }
        .footer-col a {
            display: block; font-size: 13.5px; color: #64748b;
            text-decoration: none; margin-bottom: 10px;
            transition: color .2s;
        }
        .footer-col a:hover { color: white; }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,.07);
            padding-top: 22px;
            display: flex; justify-content: space-between; align-items: center;
            font-size: 12.5px; color: #475569;
            flex-wrap: wrap; gap: 10px;
        }

        /* ══════════════════════════════
           RESPONSIVE
        ══════════════════════════════ */
        @media (max-width: 1024px) {
            .hero { padding: 60px 32px; }
            .programs-grid { grid-template-columns: repeat(3,1fr); }
        }

        @media (max-width: 900px) {
            nav { padding: 0 20px; }
            .hero { grid-template-columns: 1fr; padding: 50px 24px 40px; }
            .hero-right { display: none; }
            .stats-strip { padding: 24px; flex-direction: column; align-items: flex-start; }
            .ss-divider { display: none; }
            .programs { padding: 60px 24px; }
            .programs-grid { grid-template-columns: repeat(2,1fr); }
            .about-split { grid-template-columns: 1fr; }
            .admissions { grid-template-columns: 1fr; padding: 50px 24px; }
            .testimonials { padding: 60px 24px; }
            .testi-grid { grid-template-columns: 1fr; }
            footer { padding: 48px 24px 24px; }
            .footer-grid { grid-template-columns: 1fr; gap: 28px; }
            .footer-bottom { flex-direction: column; text-align: center; }
        }

        @media (max-width: 540px) {
            .programs-grid { grid-template-columns: 1fr 1fr; }
            .hero-heading { font-size: 38px; }
            .hero-trust { gap: 14px; }
        }

        /* scroll fade-in */
        .reveal { opacity: 0; transform: translateY(28px); transition: opacity .6s ease, transform .6s ease; }
        .reveal.visible { opacity: 1; transform: none; }

        /* Homepage refresh */
        :root {
            --green: #245c48;
            --green-dark: #183d33;
            --green-mid: #3a7960;
            --gold: #e9a23b;
            --text: #192b28;
            --text-mid: #40524d;
            --text-muted: #687a73;
            --bg: #f5f7f2;
            --border: #e1e8e1;
        }

        body { color: var(--text); background: #fff; }
        .topbar-announce {
            min-height: 38px;
            padding: 8px 20px;
            background: var(--green-dark);
            font-size: 12px;
        }
        .topbar-announce a {
            background: transparent;
            border: 0;
            border-bottom: 1px solid rgba(233,162,59,.65);
            border-radius: 0;
            padding: 0 0 2px;
        }
        nav {
            height: 76px;
            padding: 0 clamp(22px, 6vw, 88px);
            box-shadow: none;
            border-color: #edf0eb;
        }
        .nav-links { gap: 8px; }
        .nav-links a { border-radius: 5px; font-size: 13px; }
        .nav-menu-toggle { display: none; }
        .nav-btn-outline, .nav-btn-filled { border-radius: 5px; }
        .nav-btn-filled { background: var(--green); box-shadow: none; }
        .nav-btn-filled:hover { background: var(--green-dark); box-shadow: none; }
        .nav-btn-outline { border-color: #cbd9d0; }

        .hero {
            min-height: 620px;
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(360px, .92fr);
            align-items: center;
            gap: clamp(32px, 6vw, 88px);
            padding: 70px clamp(22px, 8vw, 120px) 76px;
            background: #f5f7f2;
        }
        .hero::before, .hero::after { display: none; }
        .hero-left {
            max-width: 650px;
            margin: 0;
            text-align: left;
        }
        .hero-eyebrow {
            color: var(--green);
            font-size: 11px;
            letter-spacing: 0;
            margin-bottom: 22px;
        }
        .hero-heading {
            max-width: 680px;
            margin-bottom: 20px;
            color: var(--text);
            font-family: 'Playfair Display', Georgia, serif;
            font-size: clamp(46px, 5.2vw, 72px);
            font-weight: 700;
            line-height: 1.03;
            letter-spacing: 0;
            text-shadow: none;
        }
        .hero-heading br { display: none; }
        .hero-heading .line-gold { color: var(--green); }
        .hero-heading .line-accent { color: var(--green-mid); }
        .hero-heading .line-accent::after { display: none; }
        .hero-desc {
            max-width: 530px;
            margin: 0 0 28px;
            color: var(--text-muted);
            font-size: 16px;
            line-height: 1.75;
        }
        .hero-actions { justify-content: flex-start; gap: 10px; margin-bottom: 34px; }
        .btn-hero-primary, .btn-hero-secondary {
            min-height: 48px;
            padding: 13px 20px;
            border-radius: 5px;
            font-size: 13px;
            box-shadow: none;
        }
        .btn-hero-primary { background: var(--green); color: white; }
        .btn-hero-primary:hover { background: var(--green-dark); box-shadow: none; }
        .btn-hero-secondary {
            background: transparent;
            border-color: #cbd9d0;
            color: var(--text);
        }
        .btn-hero-secondary:hover { background: white; }
        .login-icon { width: 28px; height: 28px; background: #e8eee8; color: var(--green); box-shadow: none; }
        .hero-trust { gap: 18px 24px; }
        .trust-item { gap: 9px; }
        .trust-icon {
            width: 38px; height: 38px;
            border: 0;
            border-radius: 5px;
            background: #e6ede7;
            box-shadow: none;
            font-size: 15px;
        }
        .trust-item h5 { color: var(--text); font-size: 11px; }
        .trust-item p { color: var(--text-muted); font-size: 10px; }
        .hero-visual { position: relative; width: 100%; max-width: 590px; justify-self: end; }
        .hero-image {
            display: block;
            width: 100%;
            aspect-ratio: 1.05 / 1;
            object-fit: cover;
            border-radius: 3px 72px 3px 3px;
        }
        .hero-image-note {
            position: absolute;
            left: -28px;
            bottom: 28px;
            max-width: calc(100% - 24px);
            padding: 14px 18px;
            background: white;
            border-left: 3px solid var(--gold);
            box-shadow: 0 14px 35px rgba(25,43,40,.12);
            color: var(--text);
            font-size: 12px;
            font-weight: 700;
        }
        .hero-image-note span { display: block; margin-top: 4px; color: var(--text-muted); font-size: 11px; font-weight: 400; }

        .stats-strip {
            padding: 26px clamp(22px, 8vw, 120px);
            background: var(--green);
            gap: 24px;
        }
        .ss-item i { color: #e9c27d; font-size: 21px; }
        .ss-item h3 { font-family: 'Playfair Display', Georgia, serif; font-size: 27px; font-weight: 700; }
        .ss-cta { border-radius: 4px; background: var(--gold); box-shadow: none; }
        .programs, .testimonials { padding: 82px clamp(22px, 8vw, 120px); }
        .section-label { letter-spacing: 0; }
        .section-title, .about-left h2, .admissions h2 {
            font-family: 'Playfair Display', Georgia, serif;
            letter-spacing: 0;
        }
        .section-title { font-size: clamp(28px, 3vw, 38px); }
        .programs-grid { grid-template-columns: repeat(5, minmax(0, 1fr)); gap: 12px; }
        .prog-card { border-radius: 5px; }
        .prog-card:hover { transform: translateY(-3px); box-shadow: 0 12px 24px rgba(25,43,40,.08); }
        .prog-img { height: 116px; }
        .about-split { background: #f1f5ef; }
        .about-left { padding: 76px clamp(22px, 8vw, 120px); }
        .about-right { padding: 56px clamp(22px, 6vw, 88px); background: var(--green); }
        .about-feature { border-radius: 5px; background: rgba(255,255,255,.08); }
        .admissions { padding: 66px clamp(22px, 8vw, 120px); background: var(--green-dark); }
        .adm-btn { border-radius: 4px; box-shadow: none; }
        .testi-grid { gap: 16px; }
        .testi-card { border-radius: 5px; }
        .testi-card:hover { transform: translateY(-2px); box-shadow: 0 10px 24px rgba(25,43,40,.07); }
        footer { padding: 56px clamp(22px, 8vw, 120px) 24px; background: #172d28; }

        @media (max-width: 1024px) {
            .hero { grid-template-columns: minmax(0, 1fr) minmax(300px, .8fr); gap: 32px; }
            .programs-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); }
        }
        @media (max-width: 760px) {
            nav { height: 68px; padding: 0 20px; }
            .nav-links { display: none; }
            .nav-cta-wrap { gap: 7px; }
            .nav-btn-outline, .nav-btn-filled { padding: 9px 12px; font-size: 12px; }
            .hero {
                min-height: 0;
                grid-template-columns: 1fr;
                gap: 34px;
                padding: 54px 24px 58px;
            }
            .hero-heading { max-width: 560px; font-size: clamp(44px, 10vw, 60px); }
            .hero-visual { width: min(100%, 560px); justify-self: center; }
            .hero-image { aspect-ratio: 1.3 / 1; border-top-right-radius: 46px; }
            .hero-image-note { left: 12px; bottom: 12px; }
            .hero-right { display: flex; }
            .stats-strip { align-items: flex-start; }
            .stats-strip .ss-cta { margin-left: 0 !important; }
            .programs, .testimonials { padding: 58px 24px; }
            .about-left { padding: 58px 24px; }
            .about-right { padding: 36px 24px; }
            .admissions { padding: 50px 24px; }
            footer { padding: 46px 24px 22px; }
        }
        @media (max-width: 540px) {
            .topbar-announce { gap: 7px; font-size: 10px; }
            .topbar-announce a { white-space: nowrap; }
            .nav-btn-outline { display: none; }
            .hero { padding: 44px 20px 46px; }
            .hero-heading { font-size: 44px; }
            .hero-desc { font-size: 14px; }
            .hero-trust { display: grid; grid-template-columns: 1fr 1fr; gap: 14px 10px; }
            .hero-image { aspect-ratio: 1 / 1; }
            .stats-strip { padding: 24px 20px; }
            .programs-grid { grid-template-columns: 1fr 1fr; gap: 10px; }
            .section-top { align-items: flex-start; margin-bottom: 28px; }
            .section-link { font-size: 12px; }
            .testi-grid { margin-top: 30px; }
        }

        @media (max-width: 900px) {
            nav { position: sticky; gap: 12px; }
            .nav-menu-toggle {
                width: 42px;
                height: 42px;
                flex: 0 0 42px;
                display: inline-grid;
                place-items: center;
                border: 1px solid #cbd9d0;
                border-radius: 5px;
                background: #fff;
                color: var(--green);
                font-size: 17px;
                cursor: pointer;
            }
            .nav-menu-toggle:focus-visible,
            .nav-links a:focus-visible {
                outline: 3px solid rgba(36,92,72,.3);
                outline-offset: 2px;
            }
            .nav-links,
            .nav-links.is-open {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                display: none;
                align-items: stretch;
                flex-direction: column;
                gap: 2px;
                padding: 12px 24px 18px;
                background: #fff;
                border-bottom: 1px solid var(--border);
                box-shadow: 0 12px 18px rgba(25,43,40,.08);
            }
            .nav-links.is-open { display: flex; }
            .nav-links a { min-height: 44px; display: flex; align-items: center; }
        }

        @media (max-width: 380px) {
            nav { padding-right: 12px; padding-left: 12px; gap: 7px; }
            .nav-logo { min-width: 0; gap: 7px; }
            .nav-logo img { height: 38px; }
            .nav-cta-wrap { gap: 0; }
            .nav-btn-filled { gap: 4px; padding: 8px 7px; font-size: 10px; white-space: nowrap; }
            .nav-menu-toggle { width: 38px; height: 38px; flex-basis: 38px; }
            .topbar-announce { flex-wrap: wrap; line-height: 1.4; }
        }
    </style>
</head>
<body>

{{-- ── Announcement bar ── --}}
<div class="topbar-announce">
    <i class="fas fa-graduation-cap" style="color:var(--gold);"></i>
    Admissions open for 2026/2027 Academic Year &mdash; Semester I
    <a href="{{ route('register') }}">Apply Now <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
</div>

{{-- ── Navbar ── --}}
<nav>
    <a href="/" class="nav-logo">
        <img src="{{ asset('images/logo.png') }}" alt="KampusKonnect: Connect, Collaborate, Thrive">
    </a>

    <div class="nav-links" id="primary-navigation">
        <a href="#">Home</a>
        <a href="#programs">Programs</a>
        <a href="#about">About</a>
        <a href="#testimonials">Reviews</a>
        <a href="#">Contact</a>
    </div>

    <button class="nav-menu-toggle" type="button" aria-controls="primary-navigation" aria-expanded="false" aria-label="Open navigation menu">
        <i class="fas fa-bars" aria-hidden="true"></i>
    </button>

    <div class="nav-cta-wrap">
        @auth
            @if(auth()->user()->hasRole('admin'))
                <a href="{{ route('admin.dashboard') }}" class="nav-btn-filled"><i class="fas fa-gauge-high" aria-hidden="true"></i> Dashboard</a>
            @elseif(auth()->user()->hasRole('lecturer'))
                <a href="{{ route('lecturer.dashboard') }}" class="nav-btn-filled"><i class="fas fa-gauge-high" aria-hidden="true"></i> Dashboard</a>
            @else
                <a href="{{ route('student.dashboard') }}" class="nav-btn-filled"><i class="fas fa-gauge-high" aria-hidden="true"></i> Dashboard</a>
            @endif
        @else
            <a href="{{ route('login') }}" class="nav-btn-outline">Sign In</a>
            <a href="{{ route('register') }}" class="nav-btn-filled"><i class="fas fa-user-plus"></i> Apply Now</a>
        @endauth
    </div>
</nav>

{{-- ── HERO ── --}}
<section class="hero">
    <div class="hero-left">
        <div class="hero-eyebrow">Learn &nbsp;·&nbsp; Connect &nbsp;·&nbsp; Thrive</div>

        <h1 class="hero-heading">
            Your next chapter<br>
            <span class="line-gold">starts here.</span>
        </h1>

        <p class="hero-desc">
            A world-class academic management platform for Makerere University Business School.
            Connect with courses, collaborate with peers, and manage your entire academic journey.
        </p>

        <div class="hero-actions">
            @auth
                @if(auth()->user()->hasRole('admin'))
                    <a href="{{ route('admin.dashboard') }}" class="btn-hero-primary"><i class="fas fa-gauge-high" aria-hidden="true"></i> Go to Dashboard</a>
                @elseif(auth()->user()->hasRole('lecturer'))
                    <a href="{{ route('lecturer.dashboard') }}" class="btn-hero-primary"><i class="fas fa-gauge-high" aria-hidden="true"></i> Go to Dashboard</a>
                @else
                    <a href="{{ route('student.dashboard') }}" class="btn-hero-primary"><i class="fas fa-gauge-high" aria-hidden="true"></i> Go to Dashboard</a>
                @endif
            @else
                <a href="{{ route('register') }}" class="btn-hero-primary">
                    <i class="fas fa-user-plus"></i> Create Account
                </a>
                <a href="{{ route('login') }}" class="btn-hero-secondary">
                    <div class="login-icon"><i class="fas fa-right-to-bracket" aria-hidden="true"></i></div>
                    Sign In
                </a>
            @endauth
        </div>

        <div class="hero-trust">
            <div class="trust-item">
                <div class="trust-icon" style="color:#1a5c38;"><i class="fas fa-book-open"></i></div>
                <div><h5>40+ Courses</h5><p>All Programs</p></div>
            </div>
            <div class="trust-item">
                <div class="trust-icon" style="color:#2563eb;"><i class="fas fa-chalkboard-teacher"></i></div>
                <div><h5>Expert Faculty</h5><p>25+ Lecturers</p></div>
            </div>
            <div class="trust-item">
                <div class="trust-icon" style="color:#d97706;"><i class="fas fa-shield-alt"></i></div>
                <div><h5>Secure Campus</h5><p>Role-Based Access</p></div>
            </div>
            <div class="trust-item">
                <div class="trust-icon" style="color:#3a7960;"><i class="fas fa-seedling" aria-hidden="true"></i></div>
                <div><h5>Holistic Growth</h5><p>Beyond Academics</p></div>
            </div>
        </div>
    </div>
    <div class="hero-visual">
        <img class="hero-image" src="{{ asset('images/hero-students.jpg') }}" alt="Students collaborating in a bright campus classroom">
        <div class="hero-image-note">
            A community built around your future
            <span>Learn together. Grow with purpose.</span>
        </div>
    </div>
</section>

{{-- ── STATS STRIP ── --}}
<div class="stats-strip">
    <div class="ss-item">
        <i class="fas fa-user-graduate"></i>
        <div><h3>500+</h3><p>Happy Students</p></div>
    </div>
    <div class="ss-divider"></div>
    <div class="ss-item">
        <i class="fas fa-chalkboard-teacher"></i>
        <div><h3>40+</h3><p>Expert Faculty</p></div>
    </div>
    <div class="ss-divider"></div>
    <div class="ss-item">
        <i class="fas fa-book-open"></i>
        <div><h3>25+</h3><p>Courses &amp; Activities</p></div>
    </div>
    <div class="ss-divider"></div>
    <div class="ss-item">
        <i class="fas fa-globe"></i>
        <div><h3>Global</h3><p>Learning Opportunities</p></div>
    </div>
    <a href="{{ route('register') }}" class="ss-cta" style="margin-left:auto;">
        <i class="fas fa-graduation-cap"></i> Nurturing Future Leaders <i class="fas fa-arrow-right"></i>
    </a>
</div>

{{-- ── PROGRAMS ── --}}
<section class="programs reveal" id="programs">
    <div class="section-top">
        <div>
            <div class="section-label">Our Programs</div>
            <h2 class="section-title">Academic Tracks &amp; Courses</h2>
        </div>
        <a href="{{ route('courses.index') }}" class="section-link">Explore All Programs <i class="fas fa-arrow-right"></i></a>
    </div>

    <div class="programs-grid">
        <div class="prog-card">
            <div class="prog-img" style="background:linear-gradient(135deg,#dcfce7,#bbf7d0);"><i class="fas fa-briefcase" style="color:#15803d;" aria-hidden="true"></i></div>
            <div class="prog-body">
                <h4>Business Management</h4>
                <p>Core business principles and leadership skills.</p>
                <a href="{{ route('courses.index') }}" class="prog-arrow">Explore <i class="fas fa-arrow-right" style="font-size:10px;"></i></a>
            </div>
        </div>
        <div class="prog-card">
            <div class="prog-img" style="background:linear-gradient(135deg,#dbeafe,#bfdbfe);"><i class="fas fa-laptop-code" style="color:#2563eb;" aria-hidden="true"></i></div>
            <div class="prog-body">
                <h4>Information Technology</h4>
                <p>Web, databases, software engineering and more.</p>
                <a href="{{ route('courses.index') }}" class="prog-arrow">Explore <i class="fas fa-arrow-right" style="font-size:10px;"></i></a>
            </div>
        </div>
        <div class="prog-card">
            <div class="prog-img" style="background:linear-gradient(135deg,#fef3c7,#fde68a);"><i class="fas fa-calculator" style="color:#b45309;" aria-hidden="true"></i></div>
            <div class="prog-body">
                <h4>Accounting &amp; Finance</h4>
                <p>Financial analysis, audit and reporting.</p>
                <a href="{{ route('courses.index') }}" class="prog-arrow">Explore <i class="fas fa-arrow-right" style="font-size:10px;"></i></a>
            </div>
        </div>
        <div class="prog-card">
            <div class="prog-img" style="background:linear-gradient(135deg,#ede9fe,#ddd6fe);"><i class="fas fa-bullhorn" style="color:#7c3aed;" aria-hidden="true"></i></div>
            <div class="prog-body">
                <h4>Marketing &amp; Commerce</h4>
                <p>Digital marketing, branding and sales strategy.</p>
                <a href="{{ route('courses.index') }}" class="prog-arrow">Explore <i class="fas fa-arrow-right" style="font-size:10px;"></i></a>
            </div>
        </div>
        <div class="prog-card">
            <div class="prog-img" style="background:linear-gradient(135deg,#fee2e2,#fecaca);"><i class="fas fa-globe" style="color:#dc2626;" aria-hidden="true"></i></div>
            <div class="prog-body">
                <h4>International Pathway</h4>
                <p>Global opportunities and exchange programmes.</p>
                <a href="{{ route('courses.index') }}" class="prog-arrow">Explore <i class="fas fa-arrow-right" style="font-size:10px;"></i></a>
            </div>
        </div>
    </div>
</section>

{{-- ── ABOUT SPLIT ── --}}
<section class="about-split reveal" id="about">
    <div class="about-left">
        <div class="section-label">More Than a Platform</div>
        <h2>Where <em>Learning</em> Meets Life</h2>
        <p>
            At KampusKonnect, we believe education goes beyond the classroom. We nurture curious minds,
            compassionate hearts and confident individuals ready to make a positive impact in the world
            — all through one seamless digital campus.
        </p>
        <a href="{{ route('register') }}" class="about-btn">
            <i class="fas fa-arrow-right" aria-hidden="true"></i> Discover Our School
        </a>
    </div>
    <div class="about-right">
        <div class="about-feature">
            <div class="af-icon"><i class="fas fa-building"></i></div>
            <div><h4>World-Class Infrastructure</h4><p>Modern labs, lecture halls, and digital resources</p></div>
        </div>
        <div class="about-feature">
            <div class="af-icon"><i class="fas fa-users"></i></div>
            <div><h4>Sports &amp; Co-Curricular</h4><p>Holistic development through clubs and activities</p></div>
        </div>
        <div class="about-feature">
            <div class="af-icon"><i class="fas fa-music"></i></div>
            <div><h4>Arts, Music &amp; Culture</h4><p>Nurturing creativity beyond academics</p></div>
        </div>
        <div class="about-feature">
            <div class="af-icon"><i class="fas fa-lightbulb"></i></div>
            <div><h4>Innovative Learning Spaces</h4><p>Collaborative environments built for tomorrow</p></div>
        </div>
        <div class="about-feature">
            <div class="af-icon"><i class="fas fa-heart"></i></div>
            <div><h4>Focus on Values &amp; Wellbeing</h4><p>Pastoral care and student support systems</p></div>
        </div>
    </div>
</section>

{{-- ── ADMISSIONS BANNER ── --}}
<section class="admissions reveal">
    <div>
        <div class="admissions-label">ADMISSIONS OPEN 2026–27</div>
        <h2>Give Your Child<br>a Brighter Tomorrow</h2>
        <p>Join a community that inspires, supports and empowers.</p>
    </div>
    <div class="admissions-actions">
        <div class="adm-item"><i class="fas fa-map-marker-alt"></i> Campus Tours Available</div>
        <div class="adm-item"><i class="fas fa-comments"></i> Admission Guidance</div>
        <div class="adm-item"><i class="fas fa-award"></i> Scholarship Programs</div>
        <a href="{{ route('register') }}" class="adm-btn">
            <i class="fas fa-paper-plane"></i> Enquire Now
        </a>
    </div>
</section>

{{-- ── TESTIMONIALS ── --}}
<section class="testimonials reveal" id="testimonials">
    <div style="text-align:center;">
        <div class="section-label" style="justify-content:center;">What Students Say</div>
        <h2 class="section-title">Voices from Our Community</h2>
    </div>
    <div class="testi-grid">
        <div class="testi-card">
            <div class="testi-quote">"</div>
            <div class="testi-stars" role="img" aria-label="Rated 5 out of 5">
                <i class="fas fa-star" aria-hidden="true"></i><i class="fas fa-star" aria-hidden="true"></i><i class="fas fa-star" aria-hidden="true"></i><i class="fas fa-star" aria-hidden="true"></i><i class="fas fa-star" aria-hidden="true"></i>
            </div>
            <p>KampusKonnect has been a wonderful experience. The system makes registering for courses so seamless and the announcements keep us always in the loop.</p>
            <div class="testi-person">
                <div class="testi-avatar" style="background:linear-gradient(135deg,#4f46e5,#7c3aed);">AN</div>
                <div>
                    <h5>Alice Nakato</h5>
                    <span>Year III · Business Student</span>
                </div>
            </div>
        </div>
        <div class="testi-card">
            <div class="testi-quote">"</div>
            <div class="testi-stars" role="img" aria-label="Rated 5 out of 5">
                <i class="fas fa-star" aria-hidden="true"></i><i class="fas fa-star" aria-hidden="true"></i><i class="fas fa-star" aria-hidden="true"></i><i class="fas fa-star" aria-hidden="true"></i><i class="fas fa-star" aria-hidden="true"></i>
            </div>
            <p>Excellent platform with a clean interface. Managing my courses and tracking student registrations has never been this easy. Highly recommended.</p>
            <div class="testi-person">
                <div class="testi-avatar" style="background:linear-gradient(135deg,#0ea5e9,#0284c7);">JM</div>
                <div>
                    <h5>Dr. John Mukasa</h5>
                    <span>Lecturer · IT Department</span>
                </div>
            </div>
        </div>
        <div class="testi-card">
            <div class="testi-quote">"</div>
            <div class="testi-stars" role="img" aria-label="Rated 5 out of 5">
                <i class="fas fa-star" aria-hidden="true"></i><i class="fas fa-star" aria-hidden="true"></i><i class="fas fa-star" aria-hidden="true"></i><i class="fas fa-star" aria-hidden="true"></i><i class="fas fa-star" aria-hidden="true"></i>
            </div>
            <p>A perfect balance of academic management, events and announcements. Our campus feels more connected than ever before with this system.</p>
            <div class="testi-person">
                <div class="testi-avatar" style="background:linear-gradient(135deg,#f59e0b,#d97706);">RP</div>
                <div>
                    <h5>Robert Opio</h5>
                    <span>Administrator · MUBS</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ── FOOTER ── --}}
<footer>
    <div class="footer-grid">
        <div class="footer-brand">
            <div class="fb-logo">
                <img src="{{ asset('images/logo.png') }}" alt="KampusKonnect: Connect, Collaborate, Thrive">
            </div>
            <p>The Student Management System for Makerere University Business School. Built for the future of campus life.</p>
            <div class="footer-socials">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>

        <div class="footer-col">
            <h4>Quick Links</h4>
            <a href="/">Home</a>
            <a href="#">About Us</a>
            <a href="#">Academics</a>
            <a href="{{ route('register') }}">Admissions</a>
            <a href="#">Facilities</a>
            <a href="#">Contact</a>
        </div>

        <div class="footer-col">
            <h4>Programs</h4>
            <a href="{{ route('courses.index') }}">Business Management</a>
            <a href="{{ route('courses.index') }}">Information Tech</a>
            <a href="{{ route('courses.index') }}">Accounting &amp; Finance</a>
            <a href="{{ route('courses.index') }}">Marketing</a>
            <a href="{{ route('courses.index') }}">International Pathway</a>
        </div>

        <div class="footer-col">
            <h4>Contact Us</h4>
            <a href="#"><i class="fas fa-map-marker-alt" style="width:16px;color:var(--green);"></i> Kampala, Uganda</a>
            <a href="#"><i class="fas fa-phone" style="width:16px;color:var(--green);"></i> +256 414 540 988</a>
            <a href="#"><i class="fas fa-envelope" style="width:16px;color:var(--green);"></i> info@mubs.ac.ug</a>
            <a href="#"><i class="fas fa-clock" style="width:16px;color:var(--green);"></i> Mon–Sat: 8AM – 5PM</a>
        </div>
    </div>

    <div class="footer-bottom">
        <span>&copy; {{ date('Y') }} <strong style="color:white;">KampusKonnect</strong> &mdash; Makerere University Business School</span>
        <span>BUC3131 &bull; Advanced Web Application Development &bull; 2026/2027</span>
    </div>
</footer>

<script>
    const menuToggle = document.querySelector('.nav-menu-toggle');
    const primaryNavigation = document.querySelector('#primary-navigation');
    const menuIcon = menuToggle.querySelector('i');

    const setNavigationOpen = (isOpen) => {
        primaryNavigation.classList.toggle('is-open', isOpen);
        menuToggle.setAttribute('aria-expanded', String(isOpen));
        menuToggle.setAttribute('aria-label', isOpen ? 'Close navigation menu' : 'Open navigation menu');
        menuIcon.classList.toggle('fa-bars', !isOpen);
        menuIcon.classList.toggle('fa-xmark', isOpen);
    };

    menuToggle.addEventListener('click', () => {
        setNavigationOpen(menuToggle.getAttribute('aria-expanded') !== 'true');
    });

    primaryNavigation.addEventListener('click', (event) => {
        if (event.target.closest('a')) {
            setNavigationOpen(false);
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && menuToggle.getAttribute('aria-expanded') === 'true') {
            setNavigationOpen(false);
            menuToggle.focus();
        }
    });

    // Scroll reveal
    const reveals = document.querySelectorAll('.reveal');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); } });
    }, { threshold: 0.12 });
    reveals.forEach(r => observer.observe(r));
</script>

</body>
</html>
