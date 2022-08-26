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
          <h1 class="auth-title">{{ __('auth.forgot_password.send_pwd_reset') }}</h1>
          <p class="auth-subtitle mb-5">{{ __('auth.forgot_password.title') }}</p>

          @if (session('status'))
            <div class="alert alert-success">
              <i class="bi bi-check-circle"></i> {{ session('status') }}
            </div>
          @endif

          <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" class="form-control form-control-xl @error('email') is-invalid @enderror" placeholder="{{ __('auth.email') }}" name="email">
                <div class="form-control-icon">
                    <i class="bi bi-envelope"></i>
                </div>
            </div>
            @error('email')
              <span class="error invalid-feedback">{{ $message }}</span>
            @enderror

            <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">{{ __('auth.forgot_password.send_pwd_reset') }}</button>
          </form>
          <div class="text-center mt-5 text-lg fs-4">
            <p class="text-gray-600">{{ __('auth.registration.title') }}<a href="{{ route('register') }}" class="font-bold">{{ __('auth.register') }}</a></p>
            <p>{{ __('auth.registration.have_membership') }}<a class="font-bold" href="{{ route('login') }}">{{ __('auth.sign_in') }}</a></p>
          </div>
        </div>
      </div>
      <div class="col-lg-7 d-none d-lg-block">
          <div id="auth-right">

          </div>
        </div>
      </div>
    </div>
  </div>
<script src="{{ mix('js/app.js') }}"></script>

</body>
</html>
