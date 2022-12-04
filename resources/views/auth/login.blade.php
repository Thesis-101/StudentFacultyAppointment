
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="_method" content="PUT">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/styles.scss', 'resources/js/app.js', 'resources/js/notifications.js'])
</head>
<body>
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="shadow-sm bg-white form-container m-auto">
                    <h3 class="header-label text-center">Login</h3>
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="row mb-0">
                            <label for="userInstitution_id" class="col-md-12 col-form-label text-md-start">{{ __('ID Number:') }}</label>

                            <div class="col-md-12">
                                <input id="userInstitution_id" type="text" class="form-control @error('userInstitution_id') is-invalid @enderror" name="userInstitution_id" value="{{ old('userInstitution_id') }}" required autocomplete="userInstitution_id" autofocus>

                                @error('userInstitution_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-12 col-form-label text-md-start">{{ __('Password:') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <button type="submit" class="form-btn btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            @if (Route::has('password.request'))
                                <a style="visibility: hidden;" class="col-md-8 btn btn-link text-start" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            @if (Route::has('login'))
                                <a  class="col-md-4 btn btn-link text-end" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>



