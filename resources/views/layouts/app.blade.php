<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Geert Timmermans - @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mediaQueries.css') }}" rel="stylesheet">
</head>
<body class="@yield('body_class')">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand navbarColor" href="{{ url('/') }}">
                    Home
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('hikes') }}">{{ __('Hikes') }}</a>
                            </li>

                            <li class="nav-item">
                                {{--                                trigger modal login--}}
                                <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal"> {{ __('Login') }}</a>
                                {{--                                modal login--}}
                                @if(Route::current()->getName() == 'hikes')
                                    <div class="modal fade modalOpacityHikes" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
                                        @else
                                            <div class="modal fade modalOpacity" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
                                                @endif
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header cardHeadBg text-white rounded-0">
                                                            <div class="modal-title mx-auto" id="loginModalTitle">{{ __('Login') }}</div>
                                                            {{--                                                <h5 class="modal-title" id="loginModalTitle">Login</h5>--}}
                                                            <button type="button" class="close ml-0 float-right text-white" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body p-0">
                                                            <div class="card bg-dark text-white rounded-0">


                                                                <div class="card-body">
                                                                    <form method="POST" action="{{ route('login') }}">
                                                                        @csrf

                                                                        <div class="form-group row">
                                                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                                            <div class="col-md-6">
                                                                                <input id="email" type="email" class="font-weight-bold form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                                                @error('email')
                                                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                                            <div class="col-md-6">
                                                                                <input id="password" type="password" class="font-weight-bold form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                                                @error('password')
                                                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <div class="col-md-6 offset-md-4">
                                                                                <div class="form-check">
                                                                                    <input class="font-weight-bold form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                                                    <label class="form-check-label" for="remember">
                                                                                        {{ __('Remember Me') }}
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row mb-0">
                                                                            <div class="col-md-8 offset-md-4">
                                                                                <button type="submit" class="btn btn-primary">
                                                                                    {{ __('Login') }}
                                                                                </button>

                                                                                @if (Route::has('password.request'))
                                                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                                                        {{ __('Forgot Your Password?') }}
                                                                                    </a>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    {{--                                    1 div not closed due to the if statement above with opening divs--}}
                            </li>

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    {{--                                trigger modal Register--}}
                                    <a class="nav-link" href="#" data-toggle="modal" data-target="#registerModal"> {{ __('Register') }}</a>

                                    {{--                                modal Register--}}
                                    @if(Route::current()->getName() == 'hikes')
                                        <div class="modal fade modalOpacityHikes" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalTitle" aria-hidden="true">
                                            @else
                                                <div class="modal fade modalOpacity" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalTitle" aria-hidden="true">
                                                    @endif
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header cardHeadBg text-white rounded-0">
                                                                <div class="modal-title mx-auto" id="registerModalTitle">{{ __('Register') }}</div>
                                                                {{--                                                <h5 class="modal-title" id="registerModalTitle">Login</h5>--}}
                                                                <button type="button" class="close ml-0 float-right text-white" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body p-0">
                                                                <div class="card bg-dark text-white rounded-0">


                                                                    <div class="card-body">
                                                                        <form method="POST" action="{{ route('register') }}">
                                                                            @csrf

                                                                            <div class="form-group row">
                                                                                <label for="firstName" class="col-md-4 col-form-label text-md-right">{{ __('First name') }}</label>

                                                                                <div class="col-md-6">
                                                                                    <input id="firstName" type="text" class="font-weight-bold form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName" autofocus>

                                                                                    @error('firstName')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                                                                <div class="col-md-6">
                                                                                    <input id="name" type="text" class="font-weight-bold form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                                                    @error('name')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                                                <div class="col-md-6">
                                                                                    <input id="email" type="email" class="font-weight-bold form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                                                    @error('email')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>

                                                                                <div class="col-md-6">
                                                                                    <input id="location" type="text" class="font-weight-bold form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" required autocomplete="location">

                                                                                    @error('location')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                                                <div class="col-md-6">
                                                                                    <input id="password" type="password" class="font-weight-bold form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                                                    @error('password')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                                                                <div class="col-md-6">
                                                                                    <input id="password-confirm" type="password" class="font-weight-bold form-control" name="password_confirmation" required autocomplete="new-password">
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group row mb-0">
                                                                                <div class="col-md-6 offset-md-4">
                                                                                    <button type="submit" class="btn btn-primary">
                                                                                        {{ __('Register') }}
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        {{--                                    1 div not closed due to the if statement above with opening divs--}}
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->firstName }} {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-dark" href="{{ route('hikes') }}">Hikes</a>
                                    <a class="dropdown-item text-dark" href="{{ route('createHike') }}">Create hike</a>
                                    <a class="dropdown-item text-dark" href="{{ route('home') }}">Dashboard</a>
                                    <a class="dropdown-item text-dark" href="{{ route('editProfile') }}">Edit Profile</a>
                                    <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>

</body>
</html>
