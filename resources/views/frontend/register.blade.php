 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Account | Energy solution</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --green: #42b72a;
            --green-dark: #36a420;
            --text-dark: #1c1e21;
            --border: #dddfe2;
            --bg: #f0f2f5;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .auth-container {
            width: 100%;
            max-width: 420px;
        }

        .brand {
            text-align: center;
            font-size: 38px;
            font-weight: 700;
            color: var(--green);
            margin-bottom: 10px;
        }

        .tagline {
            text-align: center;
            font-size: 16px;
            color: #606770;
            margin-bottom: 25px;
        }

        .card {
            background: #fff;
            padding: 24px 24px 28px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        .card h2 {
            text-align: center;
            font-size: 20px;
            margin-bottom: 6px;
            color: var(--text-dark);
        }

        .card p {
            text-align: center;
            font-size: 13px;
            color: #606770;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 12px;
        }

        .form-group input {
            width: 100%;
            padding: 14px 12px;
            font-size: 15px;
            border-radius: 6px;
            border: 1px solid var(--border);
            background: #fff;
        }

        .form-group input:focus {
            border-color: var(--green);
            outline: none;
        }

        .btn-register {
            width: 100%;
            padding: 14px;
            margin-top: 6px;
            background: var(--green);
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            color: #fff;
            cursor: pointer;
        }

        .btn-register:hover {
            background: var(--green-dark);
        }

        .divider {
            text-align: center;
            margin: 20px 0;
            position: relative;
        }

        .divider::before {
            content: "";
            position: absolute;
            left: 0;
            top: 50%;
            width: 100%;
            height: 1px;
            background: var(--border);
        }

        .divider span {
            background: #fff;
            padding: 0 10px;
            font-size: 13px;
            color: #606770;
            position: relative;
        }

        .login-link {
            text-align: center;
            font-size: 14px;
        }

        .login-link a {
            color: var(--green);
            text-decoration: none;
            font-weight: 500;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .error-list {
            background: #fff4f4;
            border: 1px solid #ffd6d6;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 14px;
            font-size: 13px;
            color: #c0392b;
        }
    </style>
</head>
<body>

<div class="auth-container">

    <div class="brand">Energy solution</div>
    <div class="tagline">Clean energy for a brighter future</div>

    <div class="card">
        <h2>Create a new account</h2>
        <p>It’s quick and easy.</p>

        @if ($errors->any())
            <ul class="error-list">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ route('user.register.post') }}">
            @csrf

            <div class="form-group">
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Full name">
            </div>

            <div class="form-group">
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email address">
            </div>

            <div class="form-group">
                <input type="password" name="password" placeholder="New password">
            </div>

            <div class="form-group">
                <input type="password" name="password_confirmation" placeholder="Confirm password">
            </div>

            <button type="submit" class="btn-register">Sign Up</button>
        </form>

        <div class="divider">
            <span>or</span>
        </div>

        <div class="login-link">
            Already have an account?
            <a href="{{ url('login') }}">Log in</a>
        </div>
    </div>

</div>

</body>
</html>
