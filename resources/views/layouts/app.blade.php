<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    <!-- Scripts -->
    <link rel='stylesheet'
          href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="main d-flex flex-column justify-content-between">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Dreamz Tech
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @auth
                        @if(auth()->user()->hasRole('admin'))
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('home') ? 'active fw-bold' : '' }}" aria-current="page" href="/home">Home</a>
                            </li>
                            @if(auth()->user()->hasVerifiedEmail())
                                <li class="nav-item">
                                    <a class="nav-link {{ str_contains(Request::route()->uri(), 'roles') ? 'active fw-bold' : '' }}" aria-current="page" href="{{ route('roles.index') }}">Roles</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ str_contains(Request::route()->uri(), 'permission') ? 'active fw-bold' : '' }}" aria-current="page" href="{{ route('permission.index') }}">Permission</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ str_contains(Request::route()->uri(), 'users') ? 'active fw-bold' : '' }}" aria-current="page" href="{{ route('users.index') }}">User</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('home') ? 'active fw-bold' : '' }}" aria-current="page" href="/home">Home</a>
                            </li>
                            @if(auth()->user()->hasVerifiedEmail())
                                <li class="nav-item">
                                    <a class="nav-link {{ str_contains(Request::route()->uri(), 'users') ? 'active fw-bold' : '' }}" aria-current="page" href="{{ route('users.index') }}">User</a>
                                </li>
                            @endif
                        @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="#" >Ganti Password</a>

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
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="py-4">
        @yield('content')
    </div>

</div>

<script src='https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js'></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@yield('scripts')
</body>
</html>
