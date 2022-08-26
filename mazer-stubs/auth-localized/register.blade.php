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
            <h1 class="auth-title">{{ __('auth.register') }}</h1>
            <p class="auth-subtitle mb-5">{{ __('auth.registration.title') }}</p>

            @if(!empty($errors))
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">
                          <i class="bi bi-x"></i> {!! $error !!}
                        </div>

                    @endforeach
                @endif
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" name="name" class="form-control form-control-xl @error('name') is-invalid @enderror" placeholder="{{ __('auth.full_name') }}" value="{{ old('name') }}">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" name="email" class="form-control form-control-xl @error('email') is-invalid @enderror" placeholder="{{ __('auth.email') }}" value="{{ old('name') }}">
                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                </div>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" name="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" name="password_confirmation" class="form-control form-control-xl @error('password_confirmation') is-invalid @enderror" placeholder="{{ __('auth.confirm_password') }}">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>

                <div class="form-group position-relative has-icon-left mb-4">
                    <div class="form-check">
                        <div class="checkbox">
                          <input type="checkbox" id="agreeTerms" name="terms" value="agree" class="form-check-input">
                          <label for="terms">{{ __('auth.registration.i_agree') }} <a href="#"> {{ __('auth.registration.terms') }}</a></label>
                        </div>
                      </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">{{ __('auth.register') }}</button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                <p class='text-gray-600'>{{ __('auth.registration.have_membership') }} <a href="{{ route('login') }}" class="font-bold">{{ __('auth.sign_in') }}</a></p>
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
