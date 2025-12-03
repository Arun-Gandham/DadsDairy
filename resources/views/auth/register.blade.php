<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Dad's Dairy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .register-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 500px;
        }
        .register-container h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            font-weight: bold;
        }
        .form-control {
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 12px;
            margin-bottom: 15px;
        }
        .btn-register {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px;
            font-weight: bold;
            border-radius: 5px;
            width: 100%;
        }
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        .login-link {
            text-align: center;
            margin-top: 20px;
        }
        .login-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: bold;
        }
        .error-message {
            color: #e74c3c;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>🥛 Dad's Dairy</h1>
        <h3 style="text-align: center; font-size: 18px; margin-bottom: 30px; color: #666;">Create Account</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <input type="text" name="name" class="form-control" placeholder="Full Name" required value="{{ old('name') }}">
            @error('name')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <input type="email" name="email" class="form-control" placeholder="Email" required value="{{ old('email') }}">
            @error('email')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <input type="text" name="phone" class="form-control" placeholder="Phone (Optional)" value="{{ old('phone') }}">
            @error('phone')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <textarea name="address" class="form-control" placeholder="Address (Optional)" rows="3">{{ old('address') }}</textarea>
            @error('address')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <input type="password" name="password" class="form-control" placeholder="Password (min 8 characters)" required>
            @error('password')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
            @error('password_confirmation')
                <div class="error-message">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-register btn-primary">Register</button>
        </form>

        <div class="login-link">
            Already have an account? <a href="{{ route('login') }}">Login here</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
