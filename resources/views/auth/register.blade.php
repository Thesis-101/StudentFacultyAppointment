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
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/notifications.js','resources/js/load-departments.js'])
</head>
<body>
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="shadow-sm bg-white form-container m-auto">
                    <h3 class="header-label text-center">Register</h3>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-0">
                            <label for="name" class="col-md-12 col-form-label text-md-start">{{ __('Name:') }}</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <label for="email" class="col-md-12 col-form-label text-md-start">{{ __('Email Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0" hidden>
                            <label for="userType" class="col-md-12 col-form-label text-md-start">{{ __('User Type') }}</label>

                            <div class="col-md-12">
                                <select name="userType" id="userType" class="form-select @error('userType') is-invalid @enderror" required autofocus>
                                    <option selected value="student">Student</option>
                                </select>
                                @error('userType')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <label for="department" class="col-md-12 col-form-label text-md-start">{{ __('Department') }}</label>

                            <div class="col-md-12">
                                <select name="department" id="department" class="department-selection form-select @error('department') is-invalid @enderror" required autofocus>
                                    <option value="" selected></option>
                                </select>
                                @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <label for="school_id" class="col-md-12 col-form-label text-md-start">{{ __('School ID') }}</label>

                            <div class="col-md-12">
                                <input id="school_id" type="text" class="form-control @error('school_id') is-invalid @enderror" name="school_id" value="{{ old('school_id') }}" required autocomplete="school_id" autofocus>

                                @error('school_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <label for="password" class="col-md-12 col-form-label text-md-start">{{ __('Password:') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-12 col-form-label text-md-start">{{ __('Confirm Password:') }}</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <button type="submit" class="form-btn btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            <p class="col-md-8">Already have account?</p>

                            @if (Route::has('login'))
                                <a  class="col-md-4 btn btn-link text-end" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>


