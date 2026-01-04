<div>
    <div class="mb-10">
        <h1 class="text-3xl font-bold font-display tracking-tight mb-2">Trainer <span class="text-primary">Dashboard</span></h1>
        <p class="text-base-content/60">Welcome back! Here's what's happening with your classes today.</p>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
        <div class="group relative overflow-hidden rounded-3xl p-8 premium-gradient-1 shadow-2xl shadow-primary/20 hover-lift">
            <div class="relative z-10 flex justify-between items-start">
                <div>
                    <div class="text-white/70 font-medium mb-1">Total Classes</div>
                    <div class="text-4xl font-bold text-white tracking-tight">{{ $totalClasses }}</div>
                </div>
                <div class="p-3 bg-white/20 rounded-2xl backdrop-blur-md">
                    <span class="material-symbols-outlined text-white">fitness_center</span>
                </div>
            </div>
            <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
        </div>

        <div class="group relative overflow-hidden rounded-3xl p-8 premium-gradient-2 shadow-2xl shadow-secondary/20 hover-lift">
            <div class="relative z-10 flex justify-between items-start">
                <div>
                    <div class="text-white/70 font-medium mb-1">Upcoming Sessions</div>
                    <div class="text-4xl font-bold text-white tracking-tight">{{ $upcomingSessions }}</div>
                </div>
                <div class="p-3 bg-white/20 rounded-2xl backdrop-blur-md">
                    <span class="material-symbols-outlined text-white">event</span>
                </div>
            </div>
            <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
        </div>

        <div class="group relative overflow-hidden rounded-3xl p-8 premium-gradient-3 shadow-2xl shadow-accent/20 hover-lift">
            <div class="relative z-10 flex justify-between items-start">
                <div>
                    <div class="text-white/70 font-medium mb-1">Total Clients</div>
                    <div class="text-4xl font-bold text-white tracking-tight">{{ $totalClients }}</div>
                </div>
                <div class="p-3 bg-white/20 rounded-2xl backdrop-blur-md">
                    <span class="material-symbols-outlined text-white">group</span>
                </div>
            </div>
            <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
        <!-- My Classes Section -->
        <div class="lg:col-span-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold font-display tracking-tight flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">category</span> My Classes
                </h2>
            </div>
            
            @if($myClasses->isEmpty())
                <div class="rounded-3xl border-2 border-dashed border-base-300 p-12 text-center">
                    <span class="material-symbols-outlined text-6xl text-base-content/20 mb-4">inventory_2</span>
                    <p class="text-base-content/50">No classes assigned yet.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-foreground">
                    @foreach($myClasses as $class)
                        <div class="group bg-base-100 rounded-3xl border border-white/5 p-6 hover-lift">
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="text-xl font-bold tracking-tight group-hover:text-primary transition-colors">{{ $class->name }}</h3>
                                <div class="px-3 py-1 bg-primary/10 text-primary text-[10px] font-bold uppercase tracking-wider rounded-full">Active</div>
                            </div>
                            <p class="text-sm text-base-content/60 line-clamp-2 mb-6 leading-relaxed">{{ $class->description }}</p>
                            <div class="flex items-center gap-6 text-xs font-semibold">
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-lg text-primary/60">person</span>
                                    <span>Cap: {{ $class->capacity }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-lg text-primary/60">history</span>
                                    <span>{{ $class->schedules_count }} Sessions</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Upcoming Sessions Section -->
        <div class="lg:col-span-4">
            <h2 class="text-2xl font-bold font-display tracking-tight mb-6 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">schedule</span> Upcoming
            </h2>
            
            @if($upcomingSchedules->isEmpty())
                <div class="card bg-base-300/30 rounded-3xl p-8 border border-white/5 text-center">
                    <p class="text-base-content/50 text-sm">No upcoming sessions today.</p>
                </div>
            @else
                <div class="space-y-4">
                    @foreach($upcomingSchedules as $schedule)
                        <div class="flex items-center gap-4 bg-base-100 p-4 rounded-3xl border border-white/5 hover:border-primary/20 transition-all cursor-default">
                             <div class="w-14 h-14 rounded-2xl bg-primary/10 flex flex-col items-center justify-center text-primary font-bold">
                                <span class="text-[10px] uppercase leading-none">{{ $schedule->start_time->format('M') }}</span>
                                <span class="text-xl leading-none">{{ $schedule->start_time->format('d') }}</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-sm leading-tight mb-1">{{ $schedule->workoutClass->name }}</h4>
                                <div class="flex items-center gap-3 text-[10px] text-base-content/50 font-medium">
                                    <span class="flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[12px]">schedule</span>
                                        {{ $schedule->start_time->format('h:i A') }}
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[12px]">group</span>
                                        {{ $schedule->bookings_count }} Attendees
                                    </span>
                                </div>
                            </div>
                            <span class="material-symbols-outlined text-base-content/20 text-[18px]">chevron_right</span>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
