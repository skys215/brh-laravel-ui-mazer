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
          <h1 class="auth-title">Verify</h1>
          <p class="auth-subtitle mb-5">Verify Your Email Address</p>

          <div>
              @if (session('resent'))
              <div class="alert alert-success">
                <i class="bi bi-check-circle"></i> A fresh verification link has been sent to
                      your email address.
              </div>
              @endif

              <p>Before proceeding, please check your email for a verification link.If you did not receive
                  the email,
                <a href="#"
                   onclick="event.preventDefault(); document.getElementById('resend-form').submit();">
                    click here to request another.
                </a>
              </p>
              <form id="resend-form" action="{{ route('verification.resend') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </div>
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
