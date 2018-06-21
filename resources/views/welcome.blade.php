<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        {{--<link rel="icon" href="http://vladmaxi.net/favicon.ico" type="image/x-icon">--}}
        {{--<link rel="shortcut icon" href="http://vladmaxi.net/favicon.ico" type="image/x-icon">--}}
        {{--<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>--}}
    </head>
    <body>
        {{--<div class="flex-center position-ref full-height">--}}
            {{--@if (Route::has('login'))--}}
                {{--<div class="top-right links">--}}
                    {{--@auth--}}
                        {{--<a href="{{ url('/home') }}">Home</a>--}}
                    {{--@else--}}
                        {{--<a href="{{ route('login') }}">Login</a>--}}
                        {{--<a href="{{ route('register') }}">Register</a>--}}
                    {{--@endauth--}}
                {{--</div>--}}
            {{--@endif--}}
        {{--</div>--}}

        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" class="login">
            @csrf
            <p>
                <label for="login">E-mail</label>
                {{--<input type="text" name="login" id="login" value="">--}}
                <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </p>

            <p>
                <label for="password">Пароль:</label>
                {{--<input type="password" name="password" id="password" value="">--}}
                <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </p>

            <p class="login-submit">
                <button type="submit" class="login-button">{{ __('Login') }}</button>
            </p>


            {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                {{--{{ __('Forgot Your Password?') }}--}}
            {{--</a>--}}

            <p class="forgot-password"><a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a></p>
            <p class="forgot-password"><a href="{{ route('register') }}">Регистрация</a></p>
        </form>
        {{--<form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">--}}
            {{--@csrf--}}

            {{--<div class="form-group row">--}}
                {{--<label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                {{--<div class="col-md-6">--}}
                    {{--<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>--}}

                    {{--@if ($errors->has('email'))--}}
                        {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="form-group row">--}}
                {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                {{--<div class="col-md-6">--}}
                    {{--<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>--}}

                    {{--@if ($errors->has('password'))--}}
                        {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="form-group row">--}}
                {{--<div class="col-md-6 offset-md-4">--}}
                    {{--<div class="checkbox">--}}
                        {{--<label>--}}
                            {{--<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}--}}
                        {{--</label>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="form-group row mb-0">--}}
                {{--<div class="col-md-8 offset-md-4">--}}
                    {{--<button type="submit" class="btn btn-primary">--}}
                        {{--{{ __('Login') }}--}}
                    {{--</button>--}}

                    {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                        {{--{{ __('Forgot Your Password?') }}--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</form>--}}
    </body>
</html>
