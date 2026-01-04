<div class="font-sans antialiased text-base-content min-h-screen">
    <!-- Immersive Hero Section -->
    <div class="relative min-h-[90vh] flex items-center justify-center overflow-hidden bg-base-100 dark:bg-[#0a0a0c]">
        <!-- Ambient Background Effects -->
        <div class="absolute inset-0 z-0">
            <div
                class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] bg-primary/20 rounded-full blur-[120px] animate-pulse">
            </div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] bg-secondary/20 rounded-full blur-[120px] animate-pulse"
                style="animation-delay: 2s;"></div>
            <div class="absolute top-[20%] right-[10%] w-[30%] h-[30%] bg-accent/10 rounded-full blur-[100px] animate-pulse"
                style="animation-delay: 4s;"></div>
        </div>

        <!-- Grid Pattern Overlay -->
        <div class="absolute inset-0 z-1 opacity-[0.03] dark:opacity-[0.05]"
            style="background-image: radial-gradient(circle, currentColor 1px, transparent 1px); background-size: 40px 40px;">
        </div>

        <div class="hero-content relative z-10 text-center px-6">
            <div class="max-w-4xl">
                <div
                    class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-white/5 border border-white/10 backdrop-blur-md mb-8 animate-fade-in">
                    <span class="relative flex h-3 w-3">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-primary"></span>
                    </span>
                    <span class="text-xs font-black uppercase tracking-[0.3em] text-white/80">AlphaMode v2.0 is
                        Live</span>
                </div>

                <h1
                    class="text-6xl md:text-8xl font-display font-black tracking-tighter text-base-content dark:text-white mb-8 leading-[0.9]">
                    THE <span
                        class="bg-gradient-to-r from-primary via-secondary to-accent bg-clip-text text-transparent">EVOLUTION</span>
                    <br>OF STRENGTH
                </h1>

                <p
                    class="text-xl md:text-2xl text-base-content/60 dark:text-white/60 mb-12 max-w-2xl mx-auto font-medium leading-relaxed">
                    Step into a new era of performance. World-class trainers, <br class="hidden md:block">
                    elite facilities, and the portal to your ultimate transformation.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
                    <a href="{{ route('register') }}"
                        class="group/btn relative inline-flex items-center justify-center px-10 h-16 rounded-2xl overflow-hidden shadow-2xl shadow-primary/20 transition-all active:scale-95">
                        <div class="absolute inset-0 bg-gradient-to-r from-primary via-secondary to-accent"></div>
                        <div class="relative flex items-center gap-3">
                            <span
                                class="font-display font-black uppercase tracking-[0.2em] text-sm text-primary-content">
                                Begin Transformation
                            </span>
                            <svg class="w-5 h-5 text-primary-content group-hover/btn:translate-x-1 transition-transform"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </div>
                    </a>

                    <a href="{{ route('plans') }}"
                        class="group/btn relative inline-flex items-center justify-center px-10 h-16 rounded-2xl overflow-hidden border border-base-content/10 dark:border-white/10 backdrop-blur-sm bg-base-content/5 dark:bg-white/5 hover:bg-base-content/10 dark:hover:bg-white/10 transition-all active:scale-95">
                        <span
                            class="font-display font-black uppercase tracking-[0.2em] text-sm text-base-content dark:text-white">
                            Explore Tiers
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Floating Glass Cards (Decorative) -->
        <div class="absolute bottom-20 left-10 hidden xl:block animate-bounce" style="animation-duration: 4s;">
            <div
                class="bg-base-100/50 dark:bg-white/5 backdrop-blur-xl border border-base-content/10 dark:border-white/10 p-6 rounded-3xl shadow-2xl">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-primary/20 flex items-center justify-center text-primary">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-base-content dark:text-white font-black text-xl">1.2k+</p>
                        <p
                            class="text-base-content/40 dark:text-white/40 text-[10px] font-bold uppercase tracking-widest">
                            Active Members</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="max-w-7xl mx-auto px-6 py-24">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div
                class="group p-10 rounded-[2.5rem] bg-base-100 border border-base-content/5 shadow-2xl hover:border-primary/20 transition-all">
                <div
                    class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center text-primary mb-8 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-display font-black mb-4 uppercase tracking-tight">Elite Trainers</h3>
                <p class="text-base-content/60 leading-relaxed">
                    Work with industry veterans who specialize in biological optimization and high-performance
                    movements.
                </p>
            </div>

            <!-- Feature 2 -->
            <div
                class="group p-10 rounded-[2.5rem] bg-base-100 border border-base-content/5 shadow-2xl hover:border-secondary/20 transition-all">
                <div
                    class="w-16 h-16 rounded-2xl bg-secondary/10 flex items-center justify-center text-secondary mb-8 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-display font-black mb-4 uppercase tracking-tight">Anytime Access</h3>
                <p class="text-base-content/60 leading-relaxed">
                    Our digital-first approach allows you to manage sessions, track progress, and access facilities
                    24/7.
                </p>
            </div>

            <!-- Feature 3 -->
            <div
                class="group p-10 rounded-[2.5rem] bg-base-100 border border-base-content/5 shadow-2xl hover:border-accent/20 transition-all">
                <div
                    class="w-16 h-16 rounded-2xl bg-accent/10 flex items-center justify-center text-accent mb-8 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-display font-black mb-4 uppercase tracking-tight">Performance Portal</h3>
                <p class="text-base-content/60 leading-relaxed">
                    Harness the power of the AlphaMode portal to visualize your metrics and reach your peak faster.
                </p>
            </div>
        </div>
    </div>

    <!-- Featured Plans Showcase -->
    @if($plans->isNotEmpty())
        <div class="bg-base-content/5 py-32">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-20">
                    <h2
                        class="text-5xl font-display font-black mb-6 uppercase tracking-tight italic bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
                        Popular Tiers</h2>
                    <p class="text-base-content/40 font-black uppercase tracking-[0.3em] text-sm">Engineered for every level
                        of intensity</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($plans as $plan)
                        <div class="relative group h-full">
                            <div
                                class="absolute -inset-1 bg-gradient-to-br from-primary/20 to-secondary/20 rounded-[2.5rem] blur opacity-0 group-hover:opacity-100 transition duration-500">
                            </div>
                            <div
                                class="relative flex flex-col h-full bg-base-100 p-10 rounded-[2.5rem] border border-base-content/5 shadow-xl transition-all group-hover:scale-[1.02]">
                                <h3 class="text-3xl font-display font-black text-base-content mb-2 tracking-tight">
                                    {{ $plan->name }}
                                </h3>
                                <div class="flex items-baseline gap-2 mb-8">
                                    <span
                                        class="text-4xl font-display font-black text-primary">${{ floor($plan->price) }}</span>
                                    <span class="text-sm font-black text-base-content/40 uppercase tracking-widest">/
                                        {{ $plan->duration_days }} Days</span>
                                </div>

                                <p class="text-base-content/60 leading-relaxed mb-10 overflow-hidden line-clamp-3">
                                    {{ $plan->description }}
                                </p>

                                <div class="mt-auto pt-8 border-t border-base-content/5">
                                    <a href="{{ route('plans') }}"
                                        class="btn btn-outline btn-block rounded-2xl border-2 border-base-content/10 font-display font-black uppercase tracking-[0.2em] h-14 group-hover:border-primary group-hover:bg-primary group-hover:text-primary-content transition-all">
                                        Select Tier
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- Elite Squad (Trainers Preview) -->
    @if($featuredTrainers->isNotEmpty())
        <div class="max-w-7xl mx-auto px-6 py-32">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-20 px-4 md:px-0">
                <div>
                    <h2 class="text-5xl font-display font-black mb-6 uppercase tracking-tight italic">Elite Squad</h2>
                    <p class="text-base-content/40 font-black uppercase tracking-[0.3em] text-sm">Work with the absolute
                        best in the field</p>
                </div>
                <a href="{{ route('trainers') }}"
                    class="link text-primary font-black uppercase tracking-[0.2em] text-xs pb-2 hover:opacity-80 transition-opacity">
                    View Full Roster
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($featuredTrainers as $trainer)
                    <div class="group relative">
                        <div
                            class="absolute -inset-1 bg-gradient-to-tr from-primary via-secondary to-accent rounded-[3rem] blur opacity-20 group-hover:opacity-40 transition duration-500">
                        </div>
                        <div
                            class="relative bg-base-100 p-10 rounded-[3rem] border border-base-content/5 shadow-2xl text-center flex flex-col h-full hover:bg-base-100/40 transition-colors backdrop-blur-sm">
                            <div class="relative inline-block mx-auto mb-8">
                                <div
                                    class="w-32 h-32 rounded-[2rem] bg-gradient-to-tr from-primary to-secondary p-1 overflow-hidden group-hover:rotate-6 transition-transform duration-500">
                                    <div
                                        class="w-full h-full rounded-[1.8rem] bg-base-100 flex items-center justify-center text-4xl font-display font-black text-primary overflow-hidden">
                                        <img src="{{ $trainer->user->profile_photo_url }}" class="w-full h-full object-cover"
                                            alt="{{ $trainer->user->name }}">
                                    </div>
                                </div>
                                <div
                                    class="absolute -bottom-2 -right-2 w-10 h-10 bg-success border-4 border-base-100 rounded-2xl flex items-center justify-center text-white shadow-lg">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" />
                                    </svg>
                                </div>
                            </div>

                            <h3
                                class="text-2xl font-display font-black text-base-content mb-2 tracking-tight group-hover:text-primary transition-colors">
                                {{ $trainer->user->name }}
                            </h3>
                            <p class="text-primary text-xs font-black uppercase tracking-[0.3em] mb-4">
                                {{ $trainer->specialties }}
                            </p>

                            <p class="text-sm text-base-content/50 leading-relaxed mb-8 flex-grow">
                                {{ Str::limit($trainer->bio, 100) }}
                            </p>

                            <a href="{{ route('trainers') }}"
                                class="btn btn-ghost btn-sm text-primary font-black uppercase tracking-widest hover:bg-primary/10 rounded-xl">
                                Request Session
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Daily Coaching Highlights -->
    <div class="bg-base-200 dark:bg-[#0a0a0c] py-32 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <!-- Visual Element -->
                <div class="lg:w-1/2 relative">
                    <div
                        class="absolute -inset-4 bg-gradient-to-r from-primary/30 to-accent/30 rounded-[3rem] blur-2xl opacity-50">
                    </div>
                    <div
                        class="relative rounded-[2.5rem] overflow-hidden border border-white/10 shadow-2xl skew-y-1 hover:skew-y-0 transition-transform duration-700 group">
                        <img src="./images/built-up lady" alt="Coaching Hub"
                            class="w-full aspect-[4/3] object-cover group-hover:scale-110 transition-transform duration-1000">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent flex flex-col justify-end p-8">
                            <div class="flex items-center gap-4 mb-2">
                                <span
                                    class="w-12 h-12 rounded-full bg-primary flex items-center justify-center text-white ring-4 ring-primary/20">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" />
                                    </svg>
                                </span>
                                <p class="text-white font-black uppercase tracking-[0.2em] text-xs">New Content Daily
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:w-1/2">
                    <h2
                        class="text-5xl font-display font-black text-base-content dark:text-white mb-8 tracking-tighter uppercase italic leading-none">
                        MASTER YOUR <span
                            class="bg-gradient-to-r from-primary via-secondary to-accent bg-clip-text text-transparent">TECHNIQUE</span>
                    </h2>
                    <p class="text-xl text-base-content/50 dark:text-white/50 mb-10 leading-relaxed font-medium">
                        Access our exclusive library of coaching videos. From masterclass form breakdowns to daily
                        motivational shorts, the Hub is your 24/7 digital trainer.
                    </p>
                    <ul class="space-y-4 mb-12">
                        <li class="flex items-center gap-4 text-white/80 font-black uppercase tracking-widest text-xs">
                            <div class="w-2 h-2 rounded-full bg-primary"></div>
                            4K Form Breakdowns
                        </li>
                        <li class="flex items-center gap-4 text-white/80 font-black uppercase tracking-widest text-xs">
                            <div class="w-2 h-2 rounded-full bg-secondary"></div>
                            Nutrition Essentials
                        </li>
                        <li class="flex items-center gap-4 text-white/80 font-black uppercase tracking-widest text-xs">
                            <div class="w-2 h-2 rounded-full bg-accent"></div>
                            Elite Mindset Training
                        </li>
                    </ul>
                    <a href="{{ route('coaching.hub') }}"
                        class="group relative inline-flex items-center justify-center h-16 px-10 rounded-2xl overflow-hidden shadow-xl active:scale-95 transition-all">
                        <div class="absolute inset-0 bg-white hover:bg-white/90 transition-colors"></div>
                        <span class="relative font-display font-black uppercase tracking-[0.2em] text-sm text-black">
                            Enter The Hub
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Motivational Footer Banner -->
    <div class="max-w-7xl mx-auto px-6 pb-24">
        <div
            class="relative group p-12 md:p-24 rounded-[4rem] bg-base-100 dark:bg-gradient-to-br dark:from-[#121214] dark:to-[#0a0a0c] overflow-hidden border border-base-content/5 dark:border-white/5 shadow-2xl dark:shadow-[0_0_50px_rgba(0,0,0,0.5)]">
            <div
                class="absolute top-0 right-0 -mr-20 -mt-20 w-80 h-80 bg-primary/10 rounded-full blur-[100px] transition-transform duration-700 group-hover:scale-110">
            </div>
            <div
                class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 bg-accent/10 rounded-full blur-[100px] transition-transform duration-700 group-hover:scale-110">
            </div>

            <div class="relative z-10 text-center max-w-3xl mx-auto">
                <h2
                    class="text-4xl md:text-6xl font-display font-black text-base-content dark:text-white mb-8 tracking-tighter italic text-center">
                    STOP WATCHING. <br>
                    <span
                        class="bg-gradient-to-r from-primary via-secondary to-accent bg-clip-text text-transparent">START
                        BECOMING.</span>
                </h2>
                <p class="text-lg md:text-xl text-base-content/50 dark:text-white/50 mb-12 font-medium leading-relaxed">
                    The difference between who you are and who you want to be is what you do.
                    Join the AlphaMode community and unlock your full biological potential today.
                </p>
                <a href="{{ route('register') }}"
                    class="btn btn-primary h-16 px-12 rounded-2xl font-display font-black tracking-[0.2em] text-sm uppercase shadow-2xl shadow-primary/40 hover:scale-105 transition-transform">
                    Initialize Access
                </a>
            </div>
        </div>
    </div>
</div>