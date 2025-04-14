<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voctech</title>
    <link rel="icon" href="{{ asset('image/30441-removebg-preview (1).png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #1e1e2f, #3d3d5c);
            display: flex;
            height: 100vh;
            width: 100vw;
        }

        .left-section,
        .right-section {
            flex: 1;
            position: relative;
            height: 100%;
        }

        .left-section img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .form-overlay {
            background-color: white;
            padding: 40px;
            height: 100%;
            width: 100%;
            border-radius: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .form-overlay form {
            width: 100%;
            max-width: 400px;
        }

        .avatar {
            width: 80px;
            margin-bottom: 20px;
        }

        h4 {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            font-size: 18px;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 14px;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 18px;
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .login-button {
            background-color: #00339A;
            color: white;
            padding: 14px;
            border: none;
            width: 100%;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }

        .login-button:hover {
            background-color: #0036B1;
        }

        .forgot-password {
            text-align: center;
            margin-top: 10px;
        }

        .forgot-password a {
            color: #e91e63;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        .alert {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .alert h4 {
            margin: 0;
            font-size: 16px;
        }

        .alert .close {
            float: right;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="left-section">
        <img src="{{ asset('image/377963049_287626177359130_7108398621314244864_n.jpg') }}" alt="Left Image">
    </div>

    <div class="right-section">
        <div class="form-overlay">
            <img src="{{ asset('image/30441-removebg-preview (1).png') }}" alt="Logo" class="avatar">
            <h4>Admin Login</h4>

            <!-- Error or status messages -->
            @if(session('status'))
                <div class="alert">
                    <span class="close" onclick="this.parentElement.style.display='none'">&times;</span>
                    <h4><i class="icon fa fa-info-circle"></i> {{ session('status') }}</h4>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert">
                    <span class="close" onclick="this.parentElement.style.display='none'">&times;</span>
                    <h4><i class="icon fa fa-info-circle"></i> Please fix the following:</h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Admin User</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required>
                </div>

                <div class="form-check">
                    <input type="checkbox" id="remember_me" name="remember">
                    <label for="remember_me">Remember Me</label>
                </div>

                <button type="submit" class="login-button">Login</button>
            </form>

            <div class="forgot-password">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">I forgot my password</a>
                @endif
            </div>
            <div class="guest-dashboard-link">
                 <a href="{{ route('guest.dashboard') }}">Go to Guest Dashboard</a>
             </div>
        </div>
    </div>


</body>
</html>
