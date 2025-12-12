<!DOCTYPE html>
<html lang="en" data-theme="light" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-base-200 min-h-screen">

    <div class="w-[90%] max-w-7xl mx-auto pt-5">

        <div class="navbar bg-base-100 shadow-lg rounded-2xl mb-8">
            <div class="navbar-start">
                <div class="dropdown">
                    <label tabindex="0" class="btn btn-ghost btn-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                    </label>
                    <ul tabindex="0"
                        class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                        @if(auth()->user()?->isAdmin())
                            <li><a href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                        @endif
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('plans') }}">Membership Plans</a></li>
                        <li><a href="{{ route('trainers') }}">Our Trainers</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    </ul>
                </div>
            </div>

            <div class="navbar-center">
                <a href="{{ route('home') }}" class="btn btn-ghost text-xl font-bold">
                    {{ config('app.name', 'AlphaMode') }}
                </a>
            </div>

            <div class="navbar-end gap-3">

                <button id="theme-toggle" type="button" class="btn btn-ghost btn-circle">

                    <svg id="theme-toggle-light-icon" class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z">
                        </path>
                    </svg>

                    <svg id="theme-toggle-dark-icon" class="hidden h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M17.293 10a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>

                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline btn-sm">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Register</a>
                @endguest

                @auth
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="btn btn-error btn-sm">Logout</button>
                    </form>
                @endauth

            </div>
        </div>

        <div class="min-h-screen">
            {{ $slot }}
        </div>

        <x-footer />


    </div>

</body>

</html>