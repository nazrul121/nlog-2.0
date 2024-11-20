<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .auth-container {
            min-height: 70vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f7f7f7;
        }
        .card {
            width: 100%; max-width:500px;
        }
        .toggle-link {
            cursor: pointer;
        }
        .company-logo {
            height: 50px;
        }
    </style>

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/fontawesome.css')}}">
</head>
<body>
    <!-- Header with Company Name and Logo -->
    <header class="bg-light-info text-center py-3 pt-4 pb-0 mb-0">
        <div class="container d-flex flex-column align-items-center">
            <img src="/{{ request()->get('logo') }}" alt="{{ request()->get('name') }}" class="company-logo mb-2">
        </div>
    </header>

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm pt-0">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"> {{ request()->get('name') }}  </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @foreach(request()->get('social_media') as $media)
                    <li class="list-inline-item" title="{{$media->media_name}}">
                        <a target="_" href="{{$media->link}}"><i class="{{$media->media_icon}}"></i></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>

    <!-- Authentication Container -->
    <div class="auth-container">
        @yield('content')        
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center py-3">
        <p class="mb-0">&copy; {{ date('Y') }} {{ request()->get('name') }}. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const toggleLink = document.querySelectorAll('.toggle-link');
        const loginForm = document.getElementById('login-form');
        const registerForm = document.getElementById('register-form');
        const formTitle = document.getElementById('form-title');

        toggleLink.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                loginForm.style.display = loginForm.style.display === 'none' ? 'block' : 'none';
                registerForm.style.display = registerForm.style.display === 'none' ? 'block' : 'none';
                formTitle.textContent = formTitle.textContent === 'Login' ? 'Register' : 'Login';
            });
        });
    </script>
</body>
</html>


{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- favicon -->        
    <link rel="shortcut icon" type="image/x-icon" href="{{url('/'.request()->get('favicon'))}}">
    
    @include('portion.'.request()->get('design').'.header-links')
 
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 container">
            @yield('content')
        </main>
    </div>
</body>
</html> --}}
