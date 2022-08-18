<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('css/auth.css') }}" rel="stylesheet">
</head>

<body>
    <div id="auth">

<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="{{ url('/') }}">{{ config('app.name') }}</a>
            </div>
            <h1 class="auth-title">Reset Password</h1>
            <p class="auth-subtitle mb-5">You are only one step a way from your new password, recover your password now.</p>
            <form action="{{ route('password.update') }}" method="POST">
              @csrf
              @php
                  if (!isset($token)) {
                      $token = \Request::route('token');
                  }
              @endphp

              <input type="hidden" name="token" value="{{ $token }}">
              <div class="form-group position-relative has-icon-left mb-4">
                  <input type="text" class="form-control form-control-xl" placeholder="Email" name="email">
                  <div class="form-control-icon">
                      <i class="bi bi-person"></i>
                  </div>
              </div>

              <div class="form-group position-relative has-icon-left mb-4">
                  <input type="password" class="form-control form-control-xl" placeholder="Password" name="password">
                  <div class="form-control-icon">
                      <i class="bi bi-shield-lock"></i>
                  </div>
              </div>

              <div class="form-group position-relative has-icon-left mb-4">
                  <input type="password" name="password_confirmation" class="form-control form-control-xl" placeholder="Confirm Password">
                  <div class="form-control-icon">
                      <i class="bi bi-shield-lock"></i>
                  </div>
              </div>

              <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Reset password</button>

              <div class="text-center mt-5 text-lg fs-4">
                  <p class="text-gray-600">Already has an account? <a href="{{ route('login') }}" class="font-bold">Login</a>.</p>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
          <div id="auth-right">

          </div>
        </div>
      </div>
    </div>
<script src="{{ mix('js/app.js') }}"></script>

</body>
</html>
