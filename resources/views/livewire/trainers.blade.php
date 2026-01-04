<div class="font-sans antialiased text-base-content min-h-screen py-12">
    <!-- Floating Background Elements (Glassmorphism effect) -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none -z-10">
        <div class="absolute top-20 -left-20 w-80 h-80 bg-primary/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute top-1/2 -right-20 w-96 h-96 bg-secondary/10 rounded-full blur-3xl animate-pulse"
            style="animation-delay: 1s;"></div>
        <div class="absolute bottom-20 left-1/4 w-72 h-72 bg-accent/10 rounded-full blur-3xl animate-pulse"
            style="animation-delay: 2s;"></div>
    </div>

    <!-- Page Header -->
    <div class="text-center mb-20 relative">
        <div
            class="inline-block px-4 py-1.5 mb-6 text-sm font-bold tracking-wider text-primary bg-primary/10 rounded-full">
            Elite Squad
        </div>
        <h1
            class="text-5xl md:text-6xl font-display font-black mb-6 bg-gradient-to-r from-primary via-secondary to-accent bg-clip-text text-transparent">
            Our Professional Trainers
        </h1>
        <p class="text-xl text-base-content/60 max-w-2xl mx-auto leading-relaxed">
            World-class experts dedicated to pushing your limits and
            unlocking your true potential.
        </p>
    </div>

    <!-- Trainers Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-12 max-w-7xl mx-auto px-6 relative">
        @foreach($trainers as $trainer)
            <div class="group relative flex flex-col h-full">
                <!-- Card Background & Glow -->
                <div
                    class="absolute -inset-1 bg-gradient-to-b from-primary/20 to-secondary/20 rounded-[2.5rem] blur opacity-0 group-hover:opacity-100 transition duration-500">
                </div>

                <div
                    class="relative flex flex-col items-center h-full bg-base-100/60 backdrop-blur-xl p-8 rounded-[2.5rem] border border-base-content/5 shadow-xl transition-all duration-500 group-hover:-translate-y-2">

                    <!-- Avatar Section -->
                    <div class="relative mb-8 pt-4">
                        <div
                            class="absolute inset-0 bg-gradient-to-tr from-primary to-secondary rounded-full blur-md opacity-20 group-hover:opacity-40 transition-opacity">
                        </div>
                        <div
                            class="relative w-36 h-36 rounded-full p-1.5 bg-gradient-to-tr from-primary/30 to-secondary/30">
                            <img src="{{ $trainer->user->profile_photo_url }}" alt="{{ $trainer->user->name }}"
                                class="w-full h-full object-cover rounded-full border-4 border-base-100 shadow-2xl">
                        </div>
                        <!-- Status Badge -->
                        <div
                            class="absolute bottom-1 right-2 w-5 h-5 bg-success rounded-full border-4 border-base-100 shadow-lg">
                        </div>
                    </div>

                    <!-- Content Section -->
                    <div class="text-center flex-grow mb-6">
                        <h3 class="text-xl font-display font-bold text-base-content mb-1">
                            {{ $trainer->user->name }}
                        </h3>
                        <p class="text-[11px] font-bold text-primary mb-4 opacity-80">
                            {{ $trainer->specialties }}
                        </p>
                        <p class="text-sm text-base-content/60 leading-relaxed line-clamp-2 mb-6">
                            {{ $trainer->bio }}
                        </p>

                        <!-- Time Slots Section -->
                        <div class="px-2">
                            <div class="flex items-center justify-center gap-2 mb-3">
                                <span class="material-symbols-outlined text-sm text-primary">schedule</span>
                                <span class="text-[10px] font-bold text-base-content/40 uppercase tracking-wider">Available
                                    Slots</span>
                            </div>
                            <div class="flex flex-wrap justify-center gap-2">
                                @php
                                    $allUpcomingSchedules = $trainer->workoutClasses->flatMap->schedules->sortBy('start_time')->take(3);
                                @endphp

                                @if($allUpcomingSchedules->isEmpty())
                                    <span class="text-[10px] font-medium text-base-content/30 italic">No upcoming slots</span>
                                @else
                                    @foreach($allUpcomingSchedules as $schedule)
                                        <div
                                            class="px-3 py-1.5 bg-base-300/50 rounded-xl text-[10px] font-bold text-base-content/80 border border-white/5 whitespace-nowrap">
                                            {{ $schedule->start_time->format('M d • h:i A') }}
                                        </div>
                                    @endforeach
                                    @if($trainer->workoutClasses->flatMap->schedules->count() > 3)
                                        <div class="px-2 py-1.5 text-[10px] font-bold text-primary">
                                            +{{ $trainer->workoutClasses->flatMap->schedules->count() - 3 }} more
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Action Section -->
                    <div class="w-full">
                        <a href="{{ route('booking', $trainer->id) }}"
                            class="group/btn relative flex items-center justify-center w-full h-12 rounded-2xl overflow-hidden transition-all active:scale-95 shadow-lg shadow-primary/10">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-primary to-secondary opacity-90 group-hover:opacity-100 transition-opacity">
                            </div>
                            <div class="relative flex items-center gap-2">
                                <span class="text-sm font-display font-bold uppercase tracking-wider text-primary-content">
                                    Book Now
                                </span>
                                <span
                                    class="material-symbols-outlined text-primary-content text-[18px] group-hover/btn:translate-x-1 transition-transform"></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Motivational Banner -->
    <div class="mt-32 max-w-5xl mx-auto px-6">
        <div
            class="relative p-12 rounded-[3.5rem] bg-gradient-to-br from-primary to-secondary shadow-2xl overflow-hidden group">
            <div
                class="absolute top-0 right-0 -mr-20 -mt-20 w-80 h-80 bg-white/10 rounded-full blur-3xl transition-transform duration-700 group-hover:scale-110">
            </div>
            <div
                class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 bg-black/10 rounded-full blur-3xl transition-transform duration-700 group-hover:scale-110">
            </div>

            <div
                class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8 text-center md:text-left text-primary-content">
                <div class="max-w-xl">
                    <h2 class="text-3xl md:text-4xl font-display font-black mb-4">Can't decide who to pick?</h2>
                    <p class="text-lg opacity-80">
                        Take our quick fitness assessment to find the perfect trainer
                        tailored to your specific goals and workout style.
                    </p>
                </div>
                <a href="{{ route('contact') }}"
                    class="btn btn-white bg-white text-primary border-none rounded-2xl px-8 font-bold uppercase tracking-wider hover:bg-white/90 transform hover:-translate-y-1 transition-all">
                    Find My Trainer
                </a>
            </div>
        </div>
    </div>
</div>