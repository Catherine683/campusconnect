<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account | CampusConnect</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        *{margin:0;padding:0;box-sizing:border-box;}
        body{font-family:'Inter',sans-serif;background:#0f172a;min-height:100vh;display:flex;}
        .auth-split{display:flex;min-height:100vh;width:100%;}
        .auth-left{flex:1;display:flex;align-items:center;justify-content:center;padding:40px;position:relative;overflow:hidden;background:linear-gradient(135deg,#064e3b 0%,#065f46 50%,#047857 100%);}
        .auth-left-content{position:relative;z-index:1;text-align:center;max-width:380px;}
        .auth-logo{width:72px;height:72px;background:rgba(255,255,255,.15);backdrop-filter:blur(10px);border:1px solid rgba(255,255,255,.2);border-radius:20px;display:inline-flex;align-items:center;justify-content:center;font-size:32px;color:white;margin-bottom:24px;}
        .auth-left h2{font-family:'Poppins',sans-serif;font-size:28px;font-weight:800;color:white;margin-bottom:14px;line-height:1.2;}
        .auth-left p{font-size:15px;color:rgba(255,255,255,.6);line-height:1.7;margin-bottom:28px;}
        .auth-blob-1,.auth-blob-2{position:absolute;border-radius:50%;filter:blur(60px);opacity:.2;}
        .auth-blob-1{width:300px;height:300px;background:#34d399;top:-80px;right:-60px;}
        .auth-blob-2{width:250px;height:250px;background:#6ee7b7;bottom:-60px;left:-40px;}
        .step{display:flex;align-items:center;gap:14px;background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.12);border-radius:12px;padding:14px 18px;margin-bottom:10px;text-align:left;}
        .step-num{width:34px;height:34px;border-radius:9px;background:rgba(255,255,255,.15);color:white;display:flex;align-items:center;justify-content:center;font-size:14px;font-weight:700;flex-shrink:0;}
        .step h4{font-size:13px;font-weight:600;color:white;}
        .step p{font-size:11.5px;color:rgba(255,255,255,.5);}
        .auth-right{width:520px;min-height:100vh;background:white;display:flex;align-items:flex-start;justify-content:center;padding:40px 48px;overflow-y:auto;}
        .auth-form-wrap{width:100%;}
        .back-link{display:inline-flex;align-items:center;gap:6px;color:#64748b;font-size:13px;text-decoration:none;margin-bottom:28px;transition:color .2s;}
        .back-link:hover{color:#4f46e5;}
        h1{font-family:'Poppins',sans-serif;font-size:26px;font-weight:800;color:#1e293b;margin-bottom:6px;}
        .subtitle{font-size:14px;color:#64748b;margin-bottom:28px;}
        .form-group{margin-bottom:16px;}
        .form-label{display:block;font-size:13px;font-weight:600;color:#334155;margin-bottom:5px;}
        .input-wrap{position:relative;}
        .input-icon{position:absolute;left:14px;top:50%;transform:translateY(-50%);color:#94a3b8;font-size:14px;}
        .form-input{width:100%;padding:11px 14px 11px 42px;border:1.5px solid #e2e8f0;border-radius:10px;font-size:13.5px;font-family:inherit;color:#1e293b;background:white;outline:none;transition:border-color .2s,box-shadow .2s;}
        .form-input:focus{border-color:#4f46e5;box-shadow:0 0 0 3px rgba(79,70,229,.1);}
        .form-input.is-invalid{border-color:#ef4444;}
        .invalid-feedback{font-size:11.5px;color:#ef4444;margin-top:4px;}
        .form-row{display:grid;grid-template-columns:1fr 1fr;gap:14px;}
        .btn-auth{width:100%;padding:13px;background:linear-gradient(135deg,#4f46e5,#7c3aed);color:white;border:none;border-radius:11px;font-size:15px;font-weight:700;cursor:pointer;font-family:inherit;transition:all .25s;display:flex;align-items:center;justify-content:center;gap:8px;}
        .btn-auth:hover{transform:translateY(-1px);box-shadow:0 6px 20px rgba(79,70,229,.35);}
        .auth-link-row{text-align:center;font-size:13.5px;color:#64748b;margin-top:18px;}
        .auth-link-row a{color:#4f46e5;font-weight:600;text-decoration:none;}
        .password-hint{font-size:11.5px;color:#94a3b8;margin-top:4px;}
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
            <div class="auth-logo"><i class="fas fa-user-plus"></i></div>
            <h2>Join CampusConnect</h2>
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
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
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
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <div class="input-wrap">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="form-input {{ $errors->has('email') ? 'is-invalid' : '' }}"
                            placeholder="you@example.com" required>
                    </div>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Confirm Password</label>
                        <div class="input-wrap">
                            <i class="fas fa-lock input-icon"></i>
                            <input type="password" name="password_confirmation"
                                class="form-input"
                                placeholder="Repeat password" required>
                        </div>
                    </div>
                </div>

                <div style="background:#f0fdf4;border:1px solid #bbf7d0;border-radius:10px;padding:12px 14px;margin-bottom:20px;font-size:12.5px;color:#166534;display:flex;align-items:flex-start;gap:9px;">
                    <i class="fas fa-info-circle" style="margin-top:2px;"></i>
                    <div>
                        A student profile will be created automatically. You can update your details from your profile settings after registration.
                    </div>
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
