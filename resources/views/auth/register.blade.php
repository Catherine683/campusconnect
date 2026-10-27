<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account | CampusConnect</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@700;800&family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root{
            --green-dark:#1e4034; --green-mid:#2d5a4e; --green-light:#3d7a6a;
            --cream:#f5f0e8; --cream-light:#faf7f2; --cream-mid:#ede8df;
            --text-dark:#1a2e2a; --text-mid:#3a5249; --text-muted:#6b8c7e;
        }
        *{margin:0;padding:0;box-sizing:border-box;}
        body{font-family:'Inter',sans-serif;background:var(--cream-light);min-height:100vh;display:flex;}
        .auth-split{display:flex;min-height:100vh;width:100%;}

        /* ── Left Panel ── */
        .auth-left{
            flex:1;display:flex;align-items:center;justify-content:center;
            padding:48px;position:relative;overflow:hidden;
            background:linear-gradient(160deg, var(--green-dark) 0%, var(--green-mid) 55%, var(--green-light) 100%);
        }
        .auth-left-content{position:relative;z-index:1;text-align:center;max-width:380px;}

        .auth-logo{
            width:76px;height:76px;
            background:linear-gradient(135deg,var(--green-mid),var(--green-light));
            border:2px solid rgba(245,240,232,.2);border-radius:22px;
            display:inline-flex;align-items:center;justify-content:center;
            font-size:32px;color:var(--cream);margin-bottom:26px;
            box-shadow:0 8px 24px rgba(0,0,0,.2);
        }

        .auth-left h2{font-family:'Playfair Display',serif;font-size:30px;font-weight:800;color:var(--cream);margin-bottom:12px;line-height:1.2;}
        .auth-left p{font-size:14.5px;color:rgba(245,240,232,.65);line-height:1.75;margin-bottom:30px;}

        .auth-blob-1,.auth-blob-2{position:absolute;border-radius:50%;filter:blur(70px);opacity:.2;}
        .auth-blob-1{width:320px;height:320px;background:#8ab89e;top:-80px;right:-60px;}
        .auth-blob-2{width:260px;height:260px;background:#c8ddd6;bottom:-60px;left:-40px;}

        .step{
            display:flex;align-items:center;gap:14px;
            background:rgba(245,240,232,.08);border:1px solid rgba(245,240,232,.12);
            border-radius:14px;padding:14px 18px;margin-bottom:10px;text-align:left;
            transition:background .2s;
        }
        .step:hover{background:rgba(245,240,232,.13);}
        .step-num{
            width:36px;height:36px;border-radius:10px;
            background:rgba(245,240,232,.15);color:var(--cream);
            display:flex;align-items:center;justify-content:center;
            font-size:14px;font-weight:700;flex-shrink:0;
        }
        .step h4{font-size:13px;font-weight:600;color:var(--cream);}
        .step p{font-size:11.5px;color:rgba(245,240,232,.55);margin-top:2px;}

        /* ── Right Panel ── */
        .auth-right{
            width:520px;min-height:100vh;
            background:var(--cream-light);
            display:flex;align-items:flex-start;justify-content:center;
            padding:44px 52px;overflow-y:auto;
        }
        .auth-form-wrap{width:100%;}

        .back-link{
            display:inline-flex;align-items:center;gap:6px;
            color:var(--text-muted);font-size:13px;text-decoration:none;
            margin-bottom:28px;transition:color .2s;
        }
        .back-link:hover{color:var(--green-mid);}

        .auth-form-wrap h1{font-family:'Playfair Display',serif;font-size:28px;font-weight:800;color:var(--text-dark);margin-bottom:6px;}
        .subtitle{font-size:14px;color:var(--text-muted);margin-bottom:26px;}

        .form-group{margin-bottom:16px;}
        .form-label{display:block;font-size:13px;font-weight:600;color:var(--text-mid);margin-bottom:5px;}
        .input-wrap{position:relative;}
        .input-icon{position:absolute;left:14px;top:50%;transform:translateY(-50%);color:var(--text-muted);font-size:14px;}

        .form-input{
            width:100%;padding:11px 14px 11px 42px;
            border:1.5px solid var(--cream-mid);border-radius:10px;
            font-size:13.5px;font-family:inherit;color:var(--text-dark);
            background:#fff;outline:none;transition:border-color .2s,box-shadow .2s;
        }
        .form-input:focus{border-color:var(--green-mid);box-shadow:0 0 0 3px rgba(45,90,78,.1);}
        .form-input.is-invalid{border-color:#ef4444;}
        .invalid-feedback{font-size:11.5px;color:#ef4444;margin-top:4px;}
        .form-row{display:grid;grid-template-columns:1fr 1fr;gap:14px;}

        .info-box{
            background:#e8f5ef;border:1px solid #c8ddd6;
            border-radius:10px;padding:12px 14px;margin-bottom:20px;
            font-size:12.5px;color:var(--green-dark);
            display:flex;align-items:flex-start;gap:9px;
        }

        .btn-auth{
            width:100%;padding:13px;
            background:var(--green-mid);color:var(--cream);
            border:none;border-radius:11px;font-size:15px;font-weight:700;
            cursor:pointer;font-family:inherit;transition:all .25s;
            display:flex;align-items:center;justify-content:center;gap:8px;
            box-shadow:0 4px 14px rgba(45,90,78,.25);
        }
        .btn-auth:hover{background:var(--green-dark);transform:translateY(-1px);box-shadow:0 8px 22px rgba(45,90,78,.3);}

        .auth-link-row{text-align:center;font-size:13.5px;color:var(--text-muted);margin-top:18px;}
        .auth-link-row a{color:var(--green-mid);font-weight:600;text-decoration:none;}
        .auth-link-row a:hover{text-decoration:underline;}

        @media(max-width:900px){.auth-left{display:none;}.auth-right{width:100%;padding:30px 20px;}}
    </style>
</head>
<body>
<div class="auth-split">
    <!-- Left -->
    <div class="auth-left">
        <div class="auth-blob-1"></div>
        <div class="auth-blob-2"></div>
        <div class="auth-left-content">
            <img src="/images/logo.png" alt="KampusKonnect" style="width:100%;max-width:280px;height:auto;margin:0 auto 16px;display:block;">
            <h2>Join KampusKonnect</h2>
            <p>Create your student account and start managing your academic journey at MUBS.</p>
            <div class="step">
                <div class="step-num">1</div>
                <div><h4>Create Account</h4><p>Fill in your details to register</p></div>
            </div>
            <div class="step">
                <div class="step-num">2</div>
                <div><h4>Profile Setup</h4><p>Your student profile is created automatically</p></div>
            </div>
            <div class="step">
                <div class="step-num">3</div>
                <div><h4>Register Courses</h4><p>Browse and register for available courses</p></div>
            </div>
            <div class="step">
                <div class="step-num">4</div>
                <div><h4>Manage Your Academics</h4><p>Track registrations and announcements</p></div>
            </div>
        </div>
    </div>

    <!-- Right -->
    <div class="auth-right">
        <div class="auth-form-wrap">
            <a href="/" class="back-link"><i class="fas fa-arrow-left"></i> Back to Home</a>
            <h1>Create Account</h1>
            <p class="subtitle">Register as a student at CampusConnect</p>

            @if($errors->any())
                <div style="background:#fee2e2;border:1px solid #fecaca;border-radius:10px;padding:12px 16px;margin-bottom:18px;font-size:13px;color:#991b1b;">
                    <i class="fas fa-exclamation-circle"></i>
                    <ul style="padding-left:16px;margin-top:4px;">
                        @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <div class="input-wrap">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="form-input {{ $errors->has('name') ? 'is-invalid' : '' }}"
                            placeholder="e.g. Alice Nakato" required autofocus>
                    </div>
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <div class="input-wrap">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="form-input {{ $errors->has('email') ? 'is-invalid' : '' }}"
                            placeholder="you@example.com" required>
                    </div>
                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <div class="input-wrap">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" name="password"
                                class="form-input {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                placeholder="Min 8 characters" required>
                        </div>
                        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Confirm Password</label>
                        <div class="input-wrap">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" name="password_confirmation"
                                class="form-input" placeholder="Repeat password" required>
                        </div>
                    </div>
                </div>

                <div class="info-box">
                    <i class="fas fa-info-circle" style="margin-top:2px;flex-shrink:0;"></i>
                    <div>A student profile will be created automatically. You can update your details from your profile settings after registration.</div>
                </div>

                <button type="submit" class="btn-auth">
                    <i class="fas fa-user-plus"></i> Create My Account
                </button>
            </form>

            <div class="auth-link-row">
                Already have an account? <a href="{{ route('login') }}">Sign in</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
