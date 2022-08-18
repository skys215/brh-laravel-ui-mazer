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
          <p class="auth-subtitle mb-5">You forgot your password? Here you can easily retrieve a new password.</p>

          @if (session('status'))
            <div class="alert alert-success">
              <i class="bi bi-check-circle"></i> {{ session('status') }}
            </div>
          @endif

          <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" class="form-control form-control-xl @error('email') is-invalid @enderror" placeholder="Email" name="email">
                <div class="form-control-icon">
                    <i class="bi bi-envelope"></i>
                </div>
            </div>
            @error('email')
              <span class="error invalid-feedback">{{ $message }}</span>
            @enderror

            <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Send Password Reset Link</button>
          </form>
          <div class="text-center mt-5 text-lg fs-4">
            <p class="text-gray-600">Don't have an account? <a href="{{ route('register') }}" class="font-bold">Sign
                    up</a>.</p>
            <p>Already has an account?<a class="font-bold" href="{{ route('login') }}">Login</a>.</p>
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="main" class="pure-g">
        <div class="sidebar pure-u-1-2 pure-u-md-1-2">
            <div class="header-large">
                <h1>{{ config('app.name') }}</h1>
            </div>
        </div>

        <div class="content pure-u-1-2 pure-u-md-1-2">
            <div class="header-medium">

                <h1 class="subhead">You forgot your password? Here you can easily retrieve a new password.</h1>

                @if (session('status'))
                    <div class="pure-message message-success">
                        <p><strong>SUCCESS</strong>: {{ session('status') }}</p>
                    </div>
                @endif

                @error('email')
                <aside class="pure-message message-error">
                    <p><strong>ERROR</strong>: {{ $message }}</p>
                </aside>
                @enderror
                @error('password')
                <aside class="pure-message message-error">
                    <p><strong>ERROR</strong>: {{ $message }}</p>
                </aside>
                @enderror

                <form method="POST" action="{{ route('password.email') }}" class="pure-form pure-form-stacked">
                    @csrf
                    <fieldset>

                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Email" class="pure-input-1" value="{{ old('email') }}">

                        <button type="submit" class="pure-button button-success">Send Password Reset Link</button>

                        <p>
                            <a href="{{ route("login") }}">Login</a>
                        </p>
                        <p>
                            <a href="{{ route("register") }}">Register</a>
                        </p>
                    </fieldset>
                </form>

                <div class="footer">
                    <div class="pure-menu pure-menu-horizontal">
                        <h3>Copyright &copy; 2022 <a href="{{ url('/') }}">{{ config('app.name') }}</a>. All rights reserved.</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="{{ mix('js/app.js') }}"></script>

</body>
</html>
