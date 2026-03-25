<!DOCTYPE html>
<html lang="en" data-theme="light" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title . ' | ' : '' }}{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-base-200 min-h-screen">

    <div class="w-[90%] max-w-7xl mx-auto @if(!request()->routeIs('login', 'register')) pt-5 @endif">

        @if(session('message'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-4"
                class="fixed bottom-10 right-10 z-[100] max-w-md w-full">
                <div class="relative group">
                    <div
                        class="absolute -inset-1 bg-gradient-to-r from-primary to-accent rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-1000">
                    </div>
                    <div
                        class="relative flex items-center gap-4 p-5 bg-base-100/80 backdrop-blur-2xl rounded-2xl border border-base-content/5 shadow-2xl">
                        <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="flex-grow">
                            <p class="text-xs font-black uppercase tracking-widest text-primary mb-0.5">Notification</p>
                            <p class="text-sm font-bold text-base-content">{{ session('message') }}</p>
                        </div>
                        <button @click="show = false" class="text-base-content/20 hover:text-primary transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        @endif

        @if(!request()->routeIs('login', 'register'))
            <nav class="sticky top-5 z-50 mb-12" x-data="{ mobileMenuOpen: false }">
                <div class="relative group">
                    <!-- Glow effect -->
                    <div
                        class="absolute -inset-1 bg-gradient-to-r from-primary/20 via-secondary/20 to-accent/20 rounded-3xl blur-xl opacity-50 group-hover:opacity-100 transition duration-1000">
                    </div>

                    <div
                        class="relative flex items-center justify-between h-20 px-4 md:px-8 bg-base-100/60 backdrop-blur-2xl rounded-3xl border border-base-content/5 shadow-2xl overflow-hidden">
                        <!-- Branding -->
                        <div class="flex-shrink-0">
                            <a href="{{ route('home') }}" class="group/logo flex items-center gap-3">
                                <div
                                    class="w-10 h-10 bg-gradient-to-tr from-primary to-accent rounded-xl flex items-center justify-center p-0.5 group-hover/logo:rotate-12 transition-transform duration-500">
                                    <div
                                        class="w-full h-full bg-base-100 rounded-[0.6rem] flex items-center justify-center">
                                        <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                            class="fill-current text-primary">
                                            <path
                                                d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.378-2.314-.263-2.614-1.372-.296-1.016.223-2.129 1.13-2.613l2.253-.949c-1.294-2.478-2.54-5.326-3.882-7.854 2.924-.65 5.513.785 8.232 2.306l1.378.736.257-2.671c.145-1.467 1.298-2.551 2.768-2.551 1.54 0 2.793 1.261 2.793 2.808l-.209 2.164c2.812-1.206 5.539-2.365 7.973-1.043l-4.227 6.436c.616-.279.799-.071 1.121.28l.243.682c.404.975-.021 2.162-1.163 2.541m-10.792-5.753c1.458.75 3.197 2.181 4.398 3.523l-1.637 2.536c-1.246-1.297-2.735-2.527-4.145-3.218l1.384-2.841zm-3.664.706c-1.748.74-3.535 2.158-4.887 3.486l1.638 2.535c1.554-1.354 3.018-2.32 4.633-3.26l-1.384-2.761z" />
                                        </svg>
                                    </div>
                                </div>
                                <span
                                    class="hidden md:block text-2xl font-display font-black italic uppercase tracking-tighter bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                                    AlphaMode
                                </span>
                            </a>
                        </div>

                        <!-- Desktop Navigation -->
                        <div class="hidden lg:flex items-center gap-1">
                            <a href="{{ route('home') }}"
                                class="px-5 py-2 text-sm font-semibold text-base-content/60 hover:text-primary transition-colors {{ request()->routeIs('home') ? 'text-primary' : '' }}">Home</a>
                            <a href="{{ route('plans') }}"
                                class="px-5 py-2 text-sm font-semibold text-base-content/60 hover:text-primary transition-colors {{ request()->routeIs('plans') ? 'text-primary' : '' }}">Plans</a>
                            <a href="{{ route('trainers') }}"
                                class="px-5 py-2 text-sm font-semibold text-base-content/60 hover:text-primary transition-colors {{ request()->routeIs('trainers') ? 'text-primary' : '' }}">Trainers</a>
                            <a href="{{ route('coaching.hub') }}"
                                class="px-5 py-2 text-sm font-semibold text-base-content/60 hover:text-primary transition-colors {{ request()->routeIs('coaching.hub') ? 'text-primary' : '' }}">Coaching
                                Hub</a>
                            <a href="{{ route('contact') }}"
                                class="px-5 py-2 text-sm font-semibold text-base-content/60 hover:text-primary transition-colors {{ request()->routeIs('contact') ? 'text-primary' : '' }}">Contact
                                Us</a>
                        </div>

                        <!-- Control Cluster -->
                        <div class="flex items-center gap-4">
                            <!-- Theme Toggle -->
                            <button id="theme-toggle" type="button"
                                class="w-10 h-10 flex items-center justify-center rounded-xl bg-base-content/5 hover:bg-base-content/10 text-base-content/60 hover:text-primary transition-all active:scale-90">
                                <svg id="theme-toggle-light-icon" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z">
                                    </path>
                                </svg>
                                <svg id="theme-toggle-dark-icon" class="hidden h-5 w-5" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path d="M17.293 10a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>

                            @guest
                                <div class="hidden sm:flex items-center gap-3">
                                    <a href="{{ route('login') }}"
                                        class="px-5 py-2 text-sm font-semibold text-base-content/60 hover:text-primary transition-colors">Login</a>
                                    <a href="{{ route('register') }}"
                                        class="relative h-10 px-6 rounded-xl overflow-hidden group/reg">
                                        <div
                                            class="absolute inset-0 bg-gradient-to-r from-primary to-accent group-hover/reg:scale-110 transition-transform">
                                        </div>
                                        <span
                                            class="relative flex items-center justify-center h-full text-sm font-bold text-primary-content">Register</span>
                                    </a>
                                </div>
                            @endguest

                            @auth
                                <div class="flex items-center gap-6">
                                    <!-- User Identity -->
                                    <div
                                        class="flex flex-col items-center gap-1 group/user pr-2 border-r border-base-content/5">
                                        <a href="{{ route('profile') }}"
                                            class="relative w-10 h-10 rounded-full bg-gradient-to-tr from-primary to-accent p-0.5 shadow-lg group-hover/user:scale-110 group-hover/user:rotate-12 transition-all duration-300">
                                            <div
                                                class="w-full h-full rounded-full bg-base-100 flex items-center justify-center overflow-hidden">
                                                @if(auth()->user()->profile_photo)
                                                    <img src="{{ auth()->user()->profile_photo_url }}"
                                                        class="w-full h-full object-cover">
                                                    <span
                                                        class="text-xs font-black text-primary uppercase">{{ substr(auth()->user()->name, 0, 1) }}</span>
                                                @endif
                                            </div>
                                            <!-- Green Online Dot -->
                                            <div
                                                class="absolute bottom-0 right-0 w-3 h-3 bg-success border-2 border-base-100 rounded-full">
                                            </div>
                                        </a>
                                        <span
                                            class="text-[11px] font-bold text-base-content/40 group-hover/user:text-primary transition-colors">
                                            {{ auth()->user()->name }}
                                        </span>
                                    </div>

                                    <div class="flex items-center gap-2">
                                        @if(auth()->user()->isAdmin())
                                            <a href="{{ route('admin.dashboard') }}"
                                                class="hidden sm:flex h-10 px-5 bg-primary/10 hover:bg-primary/20 text-primary border border-primary/20 items-center gap-2 rounded-xl transition-all">
                                                <span class="text-[10px] font-bold uppercase tracking-wider">Admin Hub</span>
                                            </a>
                                        @endif

                                        <form method="POST" action="{{ route('logout') }}" class="inline">
                                            @csrf
                                            <button type="submit"
                                                class="w-10 h-10 flex items-center justify-center rounded-xl bg-error/10 hover:bg-error/20 text-error border border-error/10 transition-all active:scale-90">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endauth

                            <!-- Mobile Menu Toggle -->
                            <button @click="mobileMenuOpen = !mobileMenuOpen"
                                class="lg:hidden w-10 h-10 flex items-center justify-center rounded-xl bg-base-content/5 text-base-content/60 transition-all">
                                <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16m-7 6h7" />
                                </svg>
                                <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" style="display: none;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Mobile Navigation Menu -->
                    <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 -translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-4"
                        class="absolute top-[calc(100%+1rem)] left-0 right-0 lg:hidden z-40 p-4 bg-base-100/80 backdrop-blur-3xl rounded-3xl border border-base-content/5 shadow-2xl"
                        style="display: none;">
                        <div class="flex flex-col gap-2">
                            <a href="{{ route('home') }}"
                                class="flex items-center gap-3 px-6 py-4 rounded-2xl hover:bg-primary/10 text-base-content/60 hover:text-primary transition-all">
                                <span class="text-sm font-semibold">Home</span>
                            </a>
                            <a href="{{ route('plans') }}"
                                class="flex items-center gap-3 px-6 py-4 rounded-2xl hover:bg-primary/10 text-base-content/60 hover:text-primary transition-all">
                                <span class="text-sm font-semibold">Membership Plans</span>
                            </a>
                            @auth
                                @if(auth()->user()->isAdmin())
                                    <a href="{{ route('admin.payments') }}"
                                        class="flex items-center gap-3 px-6 py-4 rounded-2xl hover:bg-primary/10 text-base-content/60 hover:text-primary transition-all">
                                        <span class="text-sm font-semibold">Manual Payments</span>
                                    </a>
                                @endif
                            @endauth
                            <a href="{{ route('trainers') }}"
                                class="flex items-center gap-3 px-6 py-4 rounded-2xl hover:bg-primary/10 text-base-content/60 hover:text-primary transition-all">
                                <span class="text-sm font-semibold">Our Personnel</span>
                            </a>
                            <a href="{{ route('coaching.hub') }}"
                                class="flex items-center gap-3 px-6 py-4 rounded-2xl hover:bg-primary/10 text-base-content/60 hover:text-primary transition-all">
                                <span class="text-sm font-semibold">Coaching Hub</span>
                            </a>
                            <a href="{{ route('contact') }}"
                                class="flex items-center gap-3 px-6 py-4 rounded-2xl hover:bg-primary/10 text-base-content/60 hover:text-primary transition-all">
                                <span class="text-sm font-semibold">Contact Support</span>
                            </a>
                            @auth
                                <div class="mt-4 pt-4 border-t border-base-content/5 flex items-center justify-between gap-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-primary to-accent p-0.5">
                                            <div
                                                class="w-full h-full rounded-full bg-base-100 flex items-center justify-center overflow-hidden">
                                                @if(auth()->user()->profile_photo)
                                                    <img src="{{ auth()->user()->profile_photo_url }}"
                                                        class="w-full h-full object-cover">
                                                @else
                                                    <span
                                                        class="text-sm font-bold text-primary">{{ substr(auth()->user()->name, 0, 1) }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-bold text-base-content">{{ auth()->user()->name }}</span>
                                            <span
                                                class="text-[10px] font-medium text-base-content/40 uppercase tracking-wider">Active
                                                Member</span>
                                        </div>
                                    </div>

                                    <form method="POST" action="{{ route('logout') }}" class="inline">
                                        @csrf
                                        <button type="submit"
                                            class="w-12 h-12 flex items-center justify-center rounded-2xl bg-error/10 text-error border border-error/10">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            @endauth
                            @guest
                                <div class="grid grid-cols-2 gap-4 mt-4 h-14">
                                    <a href="{{ route('login') }}"
                                        class="flex items-center justify-center rounded-2xl bg-base-content/5 text-xs font-black uppercase tracking-widest italic">Login</a>
                                    <a href="{{ route('register') }}"
                                        class="flex items-center justify-center rounded-2xl bg-gradient-to-r from-primary to-accent text-primary-content text-xs font-black uppercase tracking-widest italic">Register</a>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </nav>
        @endif

        <div class="min-h-screen">
            {{ $slot }}
        </div>

    </div> <!-- End of min-h-screen div -->

    @guest
        @if(!request()->routeIs('login', 'register'))
            <footer class="relative pb-12 mt-20">
                <div class="max-w-7xl mx-auto px-4 md:px-8">
                    <div class="relative group">
                        <!-- Glow effect -->
                        <div
                            class="absolute -inset-1 bg-gradient-to-r from-primary/10 via-secondary/10 to-accent/10 rounded-[3rem] blur-2xl opacity-50 group-hover:opacity-100 transition duration-1000">
                        </div>

                        <div
                            class="relative bg-base-100/60 backdrop-blur-3xl rounded-[3rem] border border-base-content/5 shadow-2xl p-10 md:p-16 overflow-hidden">
                            <!-- Background Grid Pattern -->
                            <div class="absolute inset-0 z-0 opacity-[0.03]"
                                style="background-image: radial-gradient(circle, currentColor 1px, transparent 1px); background-size: 30px 30px;">
                            </div>

                            <div class="relative z-10 grid grid-cols-1 md:grid-cols-12 gap-16">
                                <!-- Brand Section -->
                                <div class="md:col-span-5 space-y-8">
                                    <div class="space-y-6">
                                        <a href="{{ route('home') }}" class="group/logo flex items-center gap-4">
                                            <div
                                                class="w-14 h-14 bg-gradient-to-tr from-primary to-accent rounded-2xl flex items-center justify-center p-0.5 group-hover/logo:rotate-12 transition-transform duration-500">
                                                <div
                                                    class="w-full h-full bg-base-100 rounded-[0.9rem] flex items-center justify-center">
                                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg" class="fill-current text-primary">
                                                        <path
                                                            d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.378-2.314-.263-2.614-1.372-.296-1.016.223-2.129 1.13-2.613l2.253-.949c-1.294-2.478-2.54-5.326-3.882-7.854 2.924-.65 5.513.785 8.232 2.306l1.378.736.257-2.671c.145-1.467 1.298-2.551 2.768-2.551 1.54 0 2.793 1.261 2.793 2.808l-.209 2.164c2.812-1.206 5.539-2.365 7.973-1.043l-4.227 6.436c.616-.279.799-.071 1.121.28l.243.682c.404.975-.021 2.162-1.163 2.541m-10.792-5.753c1.458.75 3.197 2.181 4.398 3.523l-1.637 2.536c-1.246-1.297-2.735-2.527-4.145-3.218l1.384-2.841zm-3.664.706c-1.748.74-3.535 2.158-4.887 3.486l1.638 2.535c1.554-1.354 3.018-2.32 4.633-3.26l-1.384-2.761z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="flex flex-col">
                                                <span
                                                    class="text-3xl font-display font-black italic uppercase tracking-tighter bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent leading-none">AlphaMode</span>
                                                <span
                                                    class="text-[10px] font-bold uppercase tracking-[0.2em] text-base-content/40">Elite
                                                    Strength Systems</span>
                                            </div>
                                        </a>
                                        <p class="text-base-content/60 leading-relaxed font-medium">
                                            The destination for those who refuse to settle. Biological optimization, elite
                                            coaching, and the evolution of human performance.
                                        </p>
                                    </div>

                                    <div class="flex items-center gap-4">
                                        <a href="#"
                                            class="w-10 h-10 rounded-xl bg-base-content/5 flex items-center justify-center text-base-content/40 hover:bg-primary/10 hover:text-primary transition-all">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                            </svg>
                                        </a>
                                        <a href="#"
                                            class="w-10 h-10 rounded-xl bg-base-content/5 flex items-center justify-center text-base-content/40 hover:bg-primary/10 hover:text-primary transition-all">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c.796 0 1.441.645 1.441 1.44s-.645 1.44-1.441 1.44c-.795 0-1.439-.645-1.439-1.44s.644-1.44 1.439-1.44z" />
                                            </svg>
                                        </a>
                                        <a href="#"
                                            class="w-10 h-10 rounded-xl bg-base-content/5 flex items-center justify-center text-base-content/40 hover:bg-primary/10 hover:text-primary transition-all">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.84 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>

                                <!-- Links Sections -->
                                <div class="md:col-span-7 grid grid-cols-2 sm:grid-cols-3 gap-12 sm:gap-8">
                                    <div class="space-y-6">
                                        <h4 class="text-xs font-black uppercase tracking-[0.2em] text-primary">Systems</h4>
                                        <ul class="space-y-4">
                                            <li><a href="{{ route('plans') }}"
                                                    class="text-sm font-bold text-base-content/50 hover:text-primary transition-colors">Performance
                                                    Tiers</a></li>
                                            <li><a href="{{ route('trainers') }}"
                                                    class="text-sm font-bold text-base-content/50 hover:text-primary transition-colors">Personnel</a>
                                            </li>
                                            <li><a href="{{ route('coaching.hub') }}"
                                                    class="text-sm font-bold text-base-content/50 hover:text-primary transition-colors">Coaching
                                                    Hub</a></li>
                                            <li><a href="#"
                                                    class="text-sm font-bold text-base-content/50 hover:text-primary transition-colors">Group
                                                    Kinetics</a></li>
                                        </ul>
                                    </div>

                                    <div class="space-y-6">
                                        <h4 class="text-xs font-black uppercase tracking-[0.2em] text-secondary">Initiative</h4>
                                        <ul class="space-y-4">
                                            <li><a href="{{ route('about') }}"
                                                    class="text-sm font-bold text-base-content/50 hover:text-primary transition-colors">About
                                                    Us</a></li>
                                            <li><a href="{{ route('contact') }}"
                                                    class="text-sm font-bold text-base-content/50 hover:text-primary transition-colors">Support</a>
                                            </li>
                                            <li><a href="{{ route('jobs') }}"
                                                    class="text-sm font-bold text-base-content/50 hover:text-primary transition-colors">Careers</a>
                                            </li>
                                            <li><a href="#"
                                                    class="text-sm font-bold text-base-content/50 hover:text-primary transition-colors">Press</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-span-2 sm:col-span-1 space-y-6">
                                        <h4 class="text-xs font-black uppercase tracking-[0.2em] text-accent">HQ</h4>
                                        <ul class="space-y-4">
                                            <li class="flex items-center gap-3 text-sm font-bold text-base-content/50">
                                                <svg class="w-4 h-4 text-accent/60" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                Lagos, NG
                                            </li>
                                            <li class="flex items-center gap-3 text-sm font-bold text-base-content/50">
                                                <svg class="w-4 h-4 text-accent/60" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                </svg>
                                                lileloving@gmail.com
                                            </li>
                                            <li class="flex items-center gap-3 text-sm font-bold text-base-content/50">
                                                <svg class="w-4 h-4 text-accent/60" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                06:00 — 22:00
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Bottom Bar -->
                            <div
                                class="relative z-10 mt-16 pt-8 border-t border-base-content/5 flex flex-col md:row justify-between items-center gap-6">
                                <p class="text-[11px] font-bold uppercase tracking-widest text-base-content/30 italic">
                                    © {{ date('Y') }} AlphaMode — Optimized for performance
                                </p>
                                <div class="flex gap-8">
                                    <a href="{{ route('privacy') }}"
                                        class="text-[10px] font-black uppercase tracking-widest text-base-content/30 hover:text-primary transition-colors">Privacy</a>
                                    <a href="{{ route('terms') }}"
                                        class="text-[10px] font-black uppercase tracking-widest text-base-content/30 hover:text-primary transition-colors">Terms</a>
                                    <a href="#"
                                        class="text-[10px] font-black uppercase tracking-widest text-base-content/30 hover:text-primary transition-colors">Compliance</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        @endif
    @endguest

    </div> <!-- End of w-[90%] max-w-7xl mx-auto pt-5 -->
</body>

</html>