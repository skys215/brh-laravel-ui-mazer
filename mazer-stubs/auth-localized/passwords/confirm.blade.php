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
          <h1 class="auth-title">{{ __('auth.confirm_password') }}</h1>
          <p class="auth-subtitle mb-5">{{ __('auth.confirm_passwords.title') }}</p>

          <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" name="password">
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
            </div>
            @error('password')
              <span class="error invalid-feedback">{{ $message }}</span>
            @enderror

            <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">{{ __('auth.confirm_password') }}</button>
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
