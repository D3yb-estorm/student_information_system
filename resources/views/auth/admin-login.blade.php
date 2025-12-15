<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Student Information System</title>
    <style>
        * { box-sizing: border-box; margin:0; padding:0 }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(135deg,#0b6623 0%,#06491a 100%); min-height:100vh; display:flex; align-items:center; justify-content:center; padding:20px; }
        .login-container { background:white; border-radius:12px; box-shadow:0 10px 40px rgba(0,0,0,0.25); width:100%; max-width:420px; padding:32px; }
        .login-header { text-align:center; margin-bottom:20px }
        .login-header h1 { font-size:1.6rem; color:#0a3d18 }
        .form-group { margin-bottom:14px }
        label { display:block; margin-bottom:6px; color:#333; font-weight:600 }
        input { width:100%; padding:10px 12px; border:1px solid #ddd; border-radius:6px }
        .login-btn { width:100%; padding:12px; background:linear-gradient(135deg,#0b8a3a 0%,#0a7731 100%); color:white; border:none; border-radius:6px; font-weight:700; cursor:pointer }
        .login-btn:hover { opacity:0.95 }
        .alert { padding:10px 12px; border-radius:6px; margin-bottom:12px }
        .alert-danger { background:#f8d7da; color:#721c24; border:1px solid #f5c6cb }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1>🔒 Admin Login</h1>
            <p style="color:#666; font-size:0.95rem;">Sign in to the administration panel</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('admin.login.post') }}">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input id="username" name="username" value="{{ old('username') }}" required autofocus />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required />
            </div>
            <button class="login-btn" type="submit">Sign in</button>
        </form>
    </div>
</body>
</html>