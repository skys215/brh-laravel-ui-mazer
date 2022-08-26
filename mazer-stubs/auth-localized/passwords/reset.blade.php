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
            <h1 class="auth-title">{{ __('auth.reset_password.reset_pwd_btn') }}</h1>
            <p class="auth-subtitle mb-5">{{ __('auth.reset_password.title') }}</p>
            <form action="{{ route('password.update') }}" method="POST">
              @csrf
              @php
                  if (!isset($token)) {
                      $token = \Request::route('token');
                  }
              @endphp

              <input type="hidden" name="token" value="{{ $token }}">
              <div class="form-group position-relative has-icon-left mb-4">
                  <input type="text" class="form-control form-control-xl" placeholder="{{ __('auth.email') }}" name="email">
                  <div class="form-control-icon">
                      <i class="bi bi-person"></i>
                  </div>
              </div>

              <div class="form-group position-relative has-icon-left mb-4">
                  <input type="password" class="form-control form-control-xl" placeholder="{{ __('Password') }}" name="password">
                  <div class="form-control-icon">
                      <i class="bi bi-shield-lock"></i>
                  </div>
              </div>

              <div class="form-group position-relative has-icon-left mb-4">
                  <input type="password" name="password_confirmation" class="form-control form-control-xl" placeholder="{{ __('auth.confirm_password') }}">
                  <div class="form-control-icon">
                      <i class="bi bi-shield-lock"></i>
                  </div>
              </div>

              <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">{{ __('auth.reset_password.reset_pwd_btn') }}</button>

              <div class="text-center mt-5 text-lg fs-4">
                  <p class="text-gray-600">{{ __('auth.registration.have_membership') }} <a href="{{ route('login') }}" class="font-bold">{{ __('auth.sign_in') }}</a></p>
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
