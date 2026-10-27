<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In | CampusConnect</title>
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
            border:2px solid rgba(245,240,232,.2);
            border-radius:22px;
            display:inline-flex;align-items:center;justify-content:center;
            font-size:32px;color:var(--cream);margin-bottom:26px;
            box-shadow:0 8px 24px rgba(0,0,0,.2);
        }

        .auth-left h2{
            font-family:'Playfair Display',serif;
            font-size:32px;font-weight:800;color:var(--cream);
            margin-bottom:12px;line-height:1.2;
        }

        .auth-left p{font-size:15px;color:rgba(245,240,232,.65);line-height:1.75;margin-bottom:36px;}

        .auth-blob-1,.auth-blob-2{
            position:absolute;border-radius:50%;filter:blur(70px);opacity:.2;
        }
        .auth-blob-1{width:320px;height:320px;background:#8ab89e;top:-80px;right:-60px;}
        .auth-blob-2{width:260px;height:260px;background:#c8ddd6;bottom:-60px;left:-40px;}

        .auth-feature{
            display:flex;align-items:center;gap:14px;
            background:rgba(245,240,232,.08);border:1px solid rgba(245,240,232,.12);
            border-radius:14px;padding:14px 18px;margin-bottom:10px;text-align:left;
            transition:background .2s;
        }
        .auth-feature:hover{background:rgba(245,240,232,.13);}

        .auth-feature-icon{
            width:40px;height:40px;border-radius:11px;background:rgba(245,240,232,.15);
            display:flex;align-items:center;justify-content:center;
            font-size:17px;color:var(--cream);flex-shrink:0;
        }

        .auth-feature h4{font-size:13px;font-weight:600;color:var(--cream);}
        .auth-feature p {font-size:11.5px;color:rgba(245,240,232,.55);margin-top:2px;}

        /* ── Right Panel ── */
        .auth-right{
            width:500px;min-height:100vh;
            background:var(--cream-light);
            display:flex;align-items:center;justify-content:center;
            padding:40px 52px;
        }

        .auth-form-wrap{width:100%;}

        .back-link{
            display:inline-flex;align-items:center;gap:6px;
            color:var(--text-muted);font-size:13px;text-decoration:none;
            margin-bottom:30px;transition:color .2s;
        }
        .back-link:hover{color:var(--green-mid);}

        .auth-form-wrap h1{
            font-family:'Playfair Display',serif;
            font-size:28px;font-weight:800;color:var(--text-dark);margin-bottom:6px;
        }
        .auth-form-wrap .subtitle{font-size:14px;color:var(--text-muted);margin-bottom:32px;}

        .form-group{margin-bottom:18px;}

        .form-label{
            display:block;font-size:13px;font-weight:600;
            color:var(--text-mid);margin-bottom:6px;
        }

        .input-wrap{position:relative;}

        .input-icon{
            position:absolute;left:14px;top:50%;transform:translateY(-50%);
            color:var(--text-muted);font-size:14px;
        }

        .form-input{
            width:100%;padding:12px 14px 12px 42px;
            border:1.5px solid var(--cream-mid);border-radius:10px;
            font-size:14px;font-family:inherit;color:var(--text-dark);
            background:#fff;outline:none;transition:border-color .2s,box-shadow .2s;
        }
        .form-input:focus{border-color:var(--green-mid);box-shadow:0 0 0 3px rgba(45,90,78,.1);}
        .form-input.is-invalid{border-color:#ef4444;}
        .invalid-feedback{font-size:11.5px;color:#ef4444;margin-top:4px;}

        .remember-row{display:flex;align-items:center;justify-content:space-between;margin-bottom:24px;}
        .remember-row label{display:flex;align-items:center;gap:8px;font-size:13px;color:var(--text-muted);cursor:pointer;}
        .remember-row input[type="checkbox"]{width:15px;height:15px;accent-color:var(--green-mid);}
        .remember-row a{font-size:13px;color:var(--green-mid);text-decoration:none;}
        .remember-row a:hover{text-decoration:underline;}

        .btn-auth{
            width:100%;padding:13px;
            background:var(--green-mid);
            color:var(--cream);border:none;border-radius:11px;
            font-size:15px;font-weight:700;cursor:pointer;
            font-family:inherit;transition:all .25s;
            display:flex;align-items:center;justify-content:center;gap:8px;
            box-shadow:0 4px 14px rgba(45,90,78,.25);
        }
        .btn-auth:hover{background:var(--green-dark);transform:translateY(-1px);box-shadow:0 8px 22px rgba(45,90,78,.3);}

        .auth-divider{
            display:flex;align-items:center;gap:12px;
            margin:22px 0;font-size:12.5px;color:var(--text-muted);
        }
        .auth-divider::before,.auth-divider::after{content:'';flex:1;height:1px;background:var(--cream-mid);}

        .auth-link-row{text-align:center;font-size:13.5px;color:var(--text-muted);}
        .auth-link-row a{color:var(--green-mid);font-weight:600;text-decoration:none;}
        .auth-link-row a:hover{text-decoration:underline;}

        .demo-box{
            background:#fff;border:1px solid var(--cream-mid);
            border-radius:12px;padding:16px;margin-top:22px;
        }
        .demo-box h5{
            font-size:11.5px;font-weight:700;color:var(--text-muted);
            text-transform:uppercase;letter-spacing:.6px;margin-bottom:12px;
        }
        .demo-credentials{display:grid;gap:8px;}

        .demo-cred{
            display:flex;align-items:center;justify-content:space-between;
            background:var(--cream-light);border:1px solid var(--cream-mid);border-radius:9px;
            padding:9px 12px;cursor:pointer;transition:border-color .2s;
        }
        .demo-cred:hover{border-color:var(--green-light);}

        .demo-cred-info{font-size:12px;}
        .demo-cred-info strong{color:var(--text-dark);display:block;}
        .demo-cred-info span{color:var(--text-muted);}

        .demo-cred-role{
            font-size:11px;font-weight:600;padding:3px 9px;border-radius:20px;flex-shrink:0;
        }
        .role-admin   {background:#e8f5ef;color:#2d5a4e;}
        .role-lecturer{background:#faf0e0;color:#8a6a2e;}
        .role-student {background:#e8f0f5;color:#2e4a5a;}

        @media(max-width:900px){
            .auth-left{display:none;}
            .auth-right{width:100%;padding:32px 24px;}
        }
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
            <h2>KampusKonnect</h2>
            <p>Your complete academic management platform for Makerere University Business School.</p>

            <div class="auth-feature">
                <div class="auth-feature-icon"><i class="fas fa-user-graduate"></i></div>
                <div>
                    <h4>Student Portal</h4>
                    <p>Register for courses and track your academic progress</p>
                </div>
            </div>
            <div class="auth-feature">
                <div class="auth-feature-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                <div>
                    <h4>Lecturer Portal</h4>
                    <p>View courses and manage your registered students</p>
                </div>
            </div>
            <div class="auth-feature">
                <div class="auth-feature-icon"><i class="fas fa-user-shield"></i></div>
                <div>
                    <h4>Admin Control Panel</h4>
                    <p>Full management of the entire academic system</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Right -->
    <div class="auth-right">
        <div class="auth-form-wrap">
            <a href="/" class="back-link"><i class="fas fa-arrow-left"></i> Back to Home</a>
            <h1>Welcome back</h1>
            <p class="subtitle">Sign in to your CampusConnect account</p>

            @if($errors->any())
                <div style="background:#fee2e2;border:1px solid #fecaca;border-radius:10px;padding:12px 16px;margin-bottom:20px;font-size:13px;color:#991b1b;display:flex;align-items:center;gap:9px;">
                    <i class="fas fa-exclamation-circle"></i> {{ $errors->first() }}
                </div>
            @endif

            @if(session('success'))
                <div style="background:#e8f5ef;border:1px solid #c8ddd6;border-radius:10px;padding:12px 16px;margin-bottom:20px;font-size:13px;color:#1e4034;display:flex;align-items:center;gap:9px;">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <div class="input-wrap">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="form-input {{ $errors->has('email') ? 'is-invalid' : '' }}"
                            placeholder="you@campusconnect.ac.ug" required autofocus>
                    </div>
                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <div class="input-wrap">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" name="password"
                            class="form-input {{ $errors->has('password') ? 'is-invalid' : '' }}"
                            placeholder="Enter your password" required>
                    </div>
                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="remember-row">
                    <label><input type="checkbox" name="remember"> Remember me</label>
                    <a href="#">Forgot password?</a>
                </div>

                <button type="submit" class="btn-auth">
                    <i class="fas fa-sign-in-alt"></i> Sign In
                </button>
            </form>

            <div class="auth-divider">or</div>
            <div class="auth-link-row">
                Don't have an account? <a href="{{ route('register') }}">Create one</a>
            </div>

            <div class="demo-box">
                <h5><i class="fas fa-key"></i> Demo Credentials — click to fill</h5>
                <div class="demo-credentials">
                    <div class="demo-cred" onclick="fillCredentials('admin@campusconnect.ac.ug','password')">
                        <div class="demo-cred-info">
                            <strong>admin@campusconnect.ac.ug</strong>
                            <span>Password: password</span>
                        </div>
                        <span class="demo-cred-role role-admin">Admin</span>
                    </div>
                    <div class="demo-cred" onclick="fillCredentials('j.mukasa@campusconnect.ac.ug','password')">
                        <div class="demo-cred-info">
                            <strong>j.mukasa@campusconnect.ac.ug</strong>
                            <span>Password: password</span>
                        </div>
                        <span class="demo-cred-role role-lecturer">Lecturer</span>
                    </div>
                    <div class="demo-cred" onclick="fillCredentials('alice.nakato@std.campusconnect.ac.ug','password')">
                        <div class="demo-cred-info">
                            <strong>alice.nakato@std.campusconnect.ac.ug</strong>
                            <span>Password: password</span>
                        </div>
                        <span class="demo-cred-role role-student">Student</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function fillCredentials(email, password) {
    document.querySelector('input[name="email"]').value = email;
    document.querySelector('input[name="password"]').value = password;
}
</script>
</body>
</html>
