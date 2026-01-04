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
                                class="px-5 py-2 text-[11px] font-black uppercase tracking-[0.2em] text-base-content/60 hover:text-primary transition-colors italic {{ request()->routeIs('home') ? 'text-primary' : '' }}">Home</a>
                            <a href="{{ route('plans') }}"
                                class="px-5 py-2 text-[11px] font-black uppercase tracking-[0.2em] text-base-content/60 hover:text-primary transition-colors italic {{ request()->routeIs('plans') ? 'text-primary' : '' }}">Plans</a>
                            <a href="{{ route('trainers') }}"
                                class="px-5 py-2 text-[11px] font-black uppercase tracking-[0.2em] text-base-content/60 hover:text-primary transition-colors italic {{ request()->routeIs('trainers') ? 'text-primary' : '' }}">Trainers</a>
                            <a href="{{ route('coaching.hub') }}"
                                class="px-5 py-2 text-[11px] font-black uppercase tracking-[0.2em] text-base-content/60 hover:text-primary transition-colors italic {{ request()->routeIs('coaching.hub') ? 'text-primary' : '' }}">Coaching</a>
                            <a href="{{ route('contact') }}"
                                class="px-5 py-2 text-[11px] font-black uppercase tracking-[0.2em] text-base-content/60 hover:text-primary transition-colors italic {{ request()->routeIs('contact') ? 'text-primary' : '' }}">Contact Us</a>
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
                                        class="px-5 py-2 text-[10px] font-black uppercase tracking-[0.2em] text-base-content/60 hover:text-primary transition-colors italic">Login</a>
                                    <a href="{{ route('register') }}"
                                        class="relative h-10 px-6 rounded-xl overflow-hidden group/reg">
                                        <div
                                            class="absolute inset-0 bg-gradient-to-r from-primary to-accent group-hover/reg:scale-110 transition-transform">
                                        </div>
                                        <span
                                            class="relative flex items-center justify-center h-full text-[10px] font-black uppercase tracking-[0.2em] text-primary-content italic">Register</span>
                                    </a>
                                </div>
                            @endguest

                            @auth
                                <div class="flex items-center gap-6">
                                    <!-- User Identity -->
                                    <div class="flex flex-col items-center gap-1 group/user pr-2 border-r border-base-content/5">
                                        <a href="{{ route('profile') }}" class="relative w-10 h-10 rounded-full bg-gradient-to-tr from-primary to-accent p-0.5 shadow-lg group-hover/user:scale-110 group-hover/user:rotate-12 transition-all duration-300">
                                            <div class="w-full h-full rounded-full bg-base-100 flex items-center justify-center overflow-hidden">
                                                @if(auth()->user()->profile_photo)
                                                    <img src="{{ auth()->user()->profile_photo_url }}" class="w-full h-full object-cover">
                                                    <span class="text-xs font-black text-primary uppercase">{{ substr(auth()->user()->name, 0, 1) }}</span>
                                                @endif
                                            </div>
                                            <!-- Green Online Dot -->
                                            <div class="absolute bottom-0 right-0 w-3 h-3 bg-success border-2 border-base-100 rounded-full"></div>
                                        </a>
                                        <span class="text-[9px] font-black uppercase tracking-[0.1em] text-base-content/40 group-hover/user:text-primary transition-colors italic">
                                            {{ auth()->user()->name }}
                                        </span>
                                    </div>

                                    <div class="flex items-center gap-2">
                                        @if(auth()->user()->isAdmin())
                                            <a href="{{ route('admin.dashboard') }}" class="hidden sm:flex h-10 px-5 bg-primary/10 hover:bg-primary/20 text-primary border border-primary/20 items-center gap-2 rounded-xl transition-all">
                                                <span class="text-[9px] font-black uppercase tracking-[0.2em] italic">Admin Hub</span>
                                            </a>
                                        @endif
                                        
                                        <form method="POST" action="{{ route('logout') }}" class="inline">
                                            @csrf
                                            <button type="submit" class="w-10 h-10 flex items-center justify-center rounded-xl bg-error/10 hover:bg-error/20 text-error border border-error/10 transition-all active:scale-90">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
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
                                <span class="text-xs font-black uppercase tracking-widest italic">Home</span>
                            </a>
                            <a href="{{ route('plans') }}"
                                class="flex items-center gap-3 px-6 py-4 rounded-2xl hover:bg-primary/10 text-base-content/60 hover:text-primary transition-all">
                                <span class="text-xs font-black uppercase tracking-widest italic">Membership Plans</span>
                            </a>
                            @auth
                                @if(auth()->user()->isAdmin())
                                    <a href="{{ route('admin.payments') }}"
                                       class="flex items-center gap-3 px-6 py-4 rounded-2xl hover:bg-primary/10 text-base-content/60 hover:text-primary transition-all">
                                        <span class="text-xs font-black uppercase tracking-widest italic">Manual Payments</span>
                                    </a>
                                @endif
                            @endauth
                            <a href="{{ route('trainers') }}"
                                class="flex items-center gap-3 px-6 py-4 rounded-2xl hover:bg-primary/10 text-base-content/60 hover:text-primary transition-all">
                                <span class="text-xs font-black uppercase tracking-widest italic">Our Personnel</span>
                            </a>
                            <a href="{{ route('coaching.hub') }}"
                                class="flex items-center gap-3 px-6 py-4 rounded-2xl hover:bg-primary/10 text-base-content/60 hover:text-primary transition-all">
                                <span class="text-xs font-black uppercase tracking-widest italic">Coaching Hub</span>
                            </a>
                            <a href="{{ route('contact') }}"
                                class="flex items-center gap-3 px-6 py-4 rounded-2xl hover:bg-primary/10 text-base-content/60 hover:text-primary transition-all">
                                <span class="text-xs font-black uppercase tracking-widest italic">Comm-Link</span>
                            </a>
                            @auth
                                <div class="mt-4 pt-4 border-t border-base-content/5 flex items-center justify-between gap-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-primary to-accent p-0.5">
                                            <div class="w-full h-full rounded-full bg-base-100 flex items-center justify-center overflow-hidden">
                                                @if(auth()->user()->profile_photo)
                                                    <img src="{{ auth()->user()->profile_photo_url }}" class="w-full h-full object-cover">
                                                @else
                                                    <span class="text-sm font-black text-primary uppercase">{{ substr(auth()->user()->name, 0, 1) }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-black text-base-content uppercase tracking-widest italic">{{ auth()->user()->name }}</span>
                                            <span class="text-[10px] font-bold text-base-content/40 uppercase tracking-tighter italic">Active Unit</span>
                                        </div>
                                    </div>
                                    
                                    <form method="POST" action="{{ route('logout') }}" class="inline">
                                        @csrf
                                        <button type="submit" class="w-12 h-12 flex items-center justify-center rounded-2xl bg-error/10 text-error border border-error/10">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
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
            <footer class="bg-base-100 dark:bg-neutral text-base-content dark:text-neutral-content py-16 border-t border-base-content/10 transition-colors duration-500">
                <div class="max-w-7xl mx-auto px-6">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-12 mb-12">
                        <!-- Branding and Description - Left side, spans 5 columns on md+ -->
                        <div class="md:col-span-5">
                            <div class="flex items-center gap-4 mb-6">
                                <svg width="48" height="48" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                    fill-rule="evenodd" clip-rule="evenodd" class="fill-current text-primary flex-shrink-0">
                                    <path
                                        d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.378-2.314-.263-2.614-1.372-.296-1.016.223-2.129 1.13-2.613l2.253-.949c-1.294-2.478-2.54-5.326-3.882-7.854 2.924-.65 5.513.785 8.232 2.306l1.378.736.257-2.671c.145-1.467 1.298-2.551 2.768-2.551 1.54 0 2.793 1.261 2.793 2.808l-.209 2.164c2.812-1.206 5.539-2.365 7.973-1.043l-4.227 6.436c.616-.279.799-.071 1.121.28l.243.682c.404.975-.021 2.162-1.163 2.541m-10.792-5.753c1.458.75 3.197 2.181 4.398 3.523l-1.637 2.536c-1.246-1.297-2.735-2.527-4.145-3.218l1.384-2.841zm-3.664.706c-1.748.74-3.535 2.158-4.887 3.486l1.638 2.535c1.554-1.354 3.018-2.32 4.633-3.26l-1.384-2.761z" />
                                </svg>
                                <div>
                                    <div class="text-2xl font-bold">AlphaMode Fitness</div>
                                    <div class="text-sm opacity-70">Empowering your fitness journey</div>
                                </div>
                            </div>
                            <p class="opacity-70 leading-relaxed max-w-md">
                                Empowering your fitness journey with expert training and premium facilities.
                            </p>
                        </div>
                        <!-- Right side: Navigation Links + Contact -->
                        <div class="md:col-span-7">
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
                                <!-- Services -->
                                <div>
                                    <h4 class="font-bold mb-4 text-lg">Services</h4>
                                    <ul class="space-y-3 opacity-70">
                                        <li><a href="{{ route('plans') }}"
                                                class="hover:text-primary transition-colors">Membership Plans</a></li>
                                        <li><a href="{{ route('trainers') }}"
                                                class="hover:text-primary transition-colors">Personal Training</a></li>
                                        <li><a class="hover:text-primary transition-colors">Group Classes</a></li>
                                        <li><a href="{{ route('coaching.hub') }}"
                                                class="hover:text-primary transition-colors">Coaching Hub</a></li>
                                    </ul>
                                </div>
                                <!-- Company -->
                                <div>
                                    <h4 class="font-bold mb-4 text-lg">Company</h4>
                                    <ul class="space-y-3 opacity-70">
                                        <li><a href="{{ route('about') }}" class="hover:text-primary transition-colors">About
                                                us</a></li>
                                        <li><a href="{{ route('contact') }}"
                                                class="hover:text-primary transition-colors">Contact</a></li>
                                        <li><a href="{{ route('jobs') }}" class="hover:text-primary transition-colors">Careers</a></li>
                                    </ul>
                                </div>
                                <!-- Contact -->
                                <div>
                                    <h4 class="font-bold mb-4 text-lg">Contact</h4>
                                    <ul class="space-y-3 opacity-70">
                                        <li class="flex items-center gap-3">
                                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                            <span>lileloving@gmail.com</span>
                                        </li>
                                        <li class="flex items-center gap-3">
                                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                            <span>+234 9055618266</span>
                                        </li>
                                        <li class="flex items-center gap-3">
                                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>Mon-Fri, 6AM-10PM</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Bottom Bar -->
                    <div
                        class="border-t border-base-content/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-sm opacity-60">
                        <p>© {{ date('Y') }} AlphaMode Fitness. All rights reserved.</p>
                        <div class="flex gap-6">
                            <a href="#" class="hover:text-primary transition-colors">Privacy Policy</a>
                            <a href="#" class="hover:text-primary transition-colors">Terms of Service</a>
                        </div>
                    </div>
                </div>
            </footer>
        @endif
    @endguest

    </div> <!-- End of w-[90%] max-w-7xl mx-auto pt-5 -->
</body>

</html>