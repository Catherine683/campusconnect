@extends('layouts.app')

@section('title', 'My Profile')
@section('page-title', 'My Profile')
@section('breadcrumb', 'Profile')

@section('content')
<div style="display:grid;grid-template-columns:280px 1fr;gap:24px;align-items:start;">

    <!-- Profile Card -->
    <div class="card">
        <div style="background:linear-gradient(135deg,#4f46e5,#7c3aed);height:80px;border-radius:12px 12px 0 0;"></div>
        <div style="padding:0 22px 22px;text-align:center;">
            <div style="margin-top:-32px;margin-bottom:14px;display:flex;justify-content:center;">
                <div style="width:64px;height:64px;border-radius:50%;border:3px solid white;background:linear-gradient(135deg,#4f46e5,#7c3aed);display:flex;align-items:center;justify-content:center;color:white;font-size:22px;font-weight:700;">
                    {{ strtoupper(substr($user->name, 0, 2)) }}
                </div>
            </div>
            <h3 style="font-size:16px;font-weight:700;color:#1e293b;">{{ $user->name }}</h3>
            <p style="font-size:12.5px;color:#94a3b8;margin-top:3px;">{{ $user->email }}</p>
            <div style="margin-top:12px;">
                <span class="badge {{ $user->hasRole('admin') ? 'badge-purple' : ($user->hasRole('lecturer') ? 'badge-success' : 'badge-info') }}" style="font-size:12px;padding:5px 14px;">
                    @if($user->hasRole('admin')) <i class="fas fa-shield-alt"></i> Administrator
                    @elseif($user->hasRole('lecturer')) <i class="fas fa-chalkboard-teacher"></i> Lecturer
                    @else <i class="fas fa-user-graduate"></i> Student
                    @endif
                </span>
            </div>

            @if($user->hasRole('student') && $user->student)
            <div style="margin-top:18px;background:#f8fafc;border-radius:10px;padding:14px;text-align:left;">
                <div style="font-size:11.5px;font-weight:700;color:#94a3b8;text-transform:uppercase;margin-bottom:8px;">Student Info</div>
                <div style="font-size:13px;color:#1e293b;font-weight:600;">{{ $user->student->student_number }}</div>
                <div style="font-size:12px;color:#64748b;margin-top:2px;">{{ $user->student->program ?? 'Program not set' }}</div>
                <div style="font-size:12px;color:#64748b;">Year {{ $user->student->year_of_study }}</div>
            </div>
            @endif

            @if($user->hasRole('lecturer') && $user->lecturer)
            <div style="margin-top:18px;background:#f8fafc;border-radius:10px;padding:14px;text-align:left;">
                <div style="font-size:11.5px;font-weight:700;color:#94a3b8;text-transform:uppercase;margin-bottom:8px;">Staff Info</div>
                <div style="font-size:13px;color:#1e293b;font-weight:600;">{{ $user->lecturer->staff_number }}</div>
                <div style="font-size:12px;color:#64748b;margin-top:2px;">{{ $user->lecturer->department ?? 'Department not set' }}</div>
                <div style="font-size:12px;color:#64748b;">{{ $user->lecturer->specialization ?? '' }}</div>
            </div>
            @endif
        </div>
    </div>

    <!-- Forms -->
    <div style="display:flex;flex-direction:column;gap:20px;">

        <!-- Update Profile -->
        <div class="card">
            <div class="card-header">
                <span class="card-title"><i class="fas fa-user-edit" style="color:#4f46e5;"></i> Update Profile</span>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf @method('PUT')
                    <div class="grid-2">
                        <div class="form-group">
                            <label class="form-label">Full Name *</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" required>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email *</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" required>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                            class="form-control" placeholder="+256...">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Bio</label>
                        <textarea name="bio" class="form-control" rows="3"
                            placeholder="Tell us about yourself...">{{ old('bio', $user->bio) }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                </form>
            </div>
        </div>

        <!-- Change Password -->
        <div class="card">
            <div class="card-header">
                <span class="card-title"><i class="fas fa-lock" style="color:#ef4444;"></i> Change Password</span>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('profile.password') }}">
                    @csrf @method('PUT')
                    <div class="form-group">
                        <label class="form-label">Current Password *</label>
                        <input type="password" name="current_password"
                            class="form-control {{ $errors->has('current_password') ? 'is-invalid' : '' }}"
                            placeholder="Enter current password" required>
                        @error('current_password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="grid-2">
                        <div class="form-group">
                            <label class="form-label">New Password *</label>
                            <input type="password" name="password"
                                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                placeholder="Min 8 characters" required>
                            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Confirm New Password *</label>
                            <input type="password" name="password_confirmation"
                                class="form-control" placeholder="Repeat new password" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-key"></i> Change Password
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
