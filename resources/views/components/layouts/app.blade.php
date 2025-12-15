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

        <footer class="footer p-10 bg-base-100 text-base-content rounded-2xl mt-12 shadow-lg">
            <aside>
                <svg width="50" height="50" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"
                    clip-rule="evenodd" class="fill-current text-primary">
                    <path
                        d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.378-2.314-.263-2.614-1.372-.296-1.016.223-2.129 1.13-2.613l2.253-.949c-1.294-2.478-2.54-5.326-3.882-7.854 2.924-.65 5.513.785 8.232 2.306l1.378.736.257-2.671c.145-1.467 1.298-2.551 2.768-2.551 1.54 0 2.793 1.261 2.793 2.808l-.209 2.164c2.812-1.206 5.539-2.365 7.973-1.043l-4.227 6.436c.616-.279.799-.071 1.121.28l.243.682c.404.975-.021 2.162-1.163 2.541m-10.792-5.753c1.458.75 3.197 2.181 4.398 3.523l-1.637 2.536c-1.246-1.297-2.735-2.527-4.145-3.218l1.384-2.841zm-3.664.706c-1.748.74-3.535 2.158-4.887 3.486l1.638 2.535c1.554-1.354 3.018-2.32 4.633-3.26l-1.384-2.761z" />
                </svg>
                <p class="font-bold text-lg">
                    AlphaMode Fitness
                    <br />
                    <span class="text-sm font-normal opacity-75">Empowering your journey since 2024</span>
                </p>
            </aside>
            <nav>
                <header class="footer-title">Services</header>
                <a href="{{ route('plans') }}" class="link link-hover">Membership Plans</a>
                <a href="{{ route('trainers') }}" class="link link-hover">Personal Training</a>
                <a class="link link-hover">Group Classes</a>
            </nav>
            <nav>
                <header class="footer-title">Company</header>
                <a href="{{ route('home') }}" class="link link-hover">About us</a>
                <a href="{{ route('contact') }}" class="link link-hover">Contact</a>
                <a class="link link-hover">Careers</a>
            </nav>
            <nav>
                <header class="footer-title">Legal</header>
                <a class="link link-hover">Terms of use</a>
                <a class="link link-hover">Privacy policy</a>
                <a class="link link-hover">Cookie policy</a>
            </nav>
        </footer>

    </div>

</body>

</html>