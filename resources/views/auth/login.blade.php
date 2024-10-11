@extends('frontend.layout.app')
@section('content')
    <div class="login">
        <div class="form-container">
            <div class="content">
                <h2>LOG IN</h2>
                <p>Enter Your Email & Password to Login</p>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-row form-2">
                    <input type="text" name="email" placeholder="Email Address" required>
                </div>
                <div class="form-row-full form-2">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <span class="toggle-password" onclick="togglePassword()">👁</span>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="extra-options">
                    <label>
                        <input type="radio" name="rememberMe"> Remember Me
                    </label>
                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                </div>

                <button>Log In</button>
                <div class="text">
                    <p>Don't Have Account? <a href="signup.html">Create Account</a> </p>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            var type = passwordField.getAttribute("type") === "password" ? "text" : "password";
            passwordField.setAttribute("type", type);
        }
    </script>
@endsection
