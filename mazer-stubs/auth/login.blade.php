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
          <h1 class="auth-title">Log in.</h1>
          <p class="auth-subtitle mb-5">Sign in to start your session</p>

          @if(!empty($errors))
              @if($errors->any())
                  @foreach($errors->all() as $error)
                      <div class="alert alert-danger">
                        <i class="bi bi-x"></i> {!! $error !!}
                      </div>
                  @endforeach
              @endif
          @endif

          <form action="{{ route('login') }}" method="POST">
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

              <div class="form-group position-relative has-icon-left mb-4">
                  <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Password" name="password">
                  <div class="form-control-icon">
                      <i class="bi bi-shield-lock"></i>
                  </div>
              </div>
              @error('password')
                <span class="error invalid-feedback">{{ $message }}</span>
              @enderror

              <div class="form-check form-check-lg d-flex align-items-end">
                  <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault" name="remember">
                  <label class="form-check-label text-gray-600" for="flexCheckDefault">
                      Remember me
                  </label>
              </div>
              <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
          </form>
          <div class="text-center mt-5 text-lg fs-4">
              <p class="text-gray-600">Don't have an account? <a href="{{ route('register') }}" class="font-bold">Sign
                      up</a>.</p>
              <p><a class="font-bold" href="{{ route('password.request') }}">Forgot password?</a>.</p>
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
