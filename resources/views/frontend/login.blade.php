<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Soliur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --green: #42b72a;
            --green-dark: #36a420;
            --bg: #f0f2f5;
        }

        body {
            background: var(--bg);
        }

        .brand {
            text-align: center;
            font-size: 34px;
            font-weight: 700;
            color: var(--green);
            margin-bottom: 5px;
        }

        .tagline {
            text-align: center;
            font-size: 14px;
            color: #606770;
            margin-bottom: 20px;
        }

        .card {
            border-radius: 8px;
            border: none;
        }

        .form-control:focus {
            border-color: var(--green);
            box-shadow: none;
        }

        .btn-soliur {
            background: var(--green);
            border: none;
            font-weight: 600;
        }

        .btn-soliur:hover {
            background: var(--green-dark);
        }

        a {
            color: var(--green);
            text-decoration: none;
            font-weight: 500;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-4">

            <div class="brand">SOLIUR</div>
            <div class="tagline">Clean energy for a brighter future</div>

            <div class="card shadow">
                <div class="card-body p-4">

                    <h4 class="text-center mb-4">Log in to your account</h4>

                    <form action="{{ route('user.login.post') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email address">
                        </div>

                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-soliur text-white py-2">Log In</button>
                        </div>

                        <p class="text-center mt-3 mb-0">
                            Don’t have an account?
                            <a href="{{ route('user.register') }}">Sign Up</a>
                        </p>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
