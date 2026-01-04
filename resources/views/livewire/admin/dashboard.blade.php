@section('title', 'Admin Hub')

<div class="space-y-12">
    <!-- Key Metrics Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
        {{-- Total Members --}}
        <div class="relative group">
            <div
                class="absolute -inset-0.5 bg-gradient-to-tr from-primary/20 to-secondary/20 rounded-[2.5rem] blur opacity-30 group-hover:opacity-50 transition duration-500">
            </div>
            <div
                class="relative bg-base-100/40 backdrop-blur-2xl p-8 rounded-[2.5rem] border border-base-content/5 shadow-2xl overflow-hidden group-hover:-translate-y-1 transition-all duration-500">
                <div
                    class="absolute top-0 right-0 -mr-4 -mt-4 w-24 h-24 bg-primary/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700">
                </div>

                <div class="relative flex flex-col h-full">
                    <div class="flex items-center justify-between mb-6">
                        <div
                            class="w-14 h-14 bg-primary/10 rounded-2xl flex items-center justify-center text-primary group-hover:rotate-6 transition-transform">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <span
                            class="text-xs font-black uppercase tracking-[0.2em] text-base-content/30 italic">Collective</span>
                    </div>

                    <div>
                        <p class="text-[10px] font-black uppercase tracking-widest text-base-content/40 mb-1">Active
                            Population</p>
                        <h3
                            class="text-4xl font-display font-black bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">
                            {{ number_format($totalMembers) }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- Monthly Bookings --}}
        <div class="relative group">
            <div
                class="absolute -inset-0.5 bg-gradient-to-tr from-secondary/20 to-accent/20 rounded-[2.5rem] blur opacity-30 group-hover:opacity-50 transition duration-500">
            </div>
            <div
                class="relative bg-base-100/40 backdrop-blur-2xl p-8 rounded-[2.5rem] border border-base-content/5 shadow-2xl overflow-hidden group-hover:-translate-y-1 transition-all duration-500">
                <div
                    class="absolute bottom-0 right-0 -mr-4 -mb-4 w-24 h-24 bg-secondary/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700">
                </div>

                <div class="relative flex flex-col h-full">
                    <div class="flex items-center justify-between mb-6">
                        <div
                            class="w-14 h-14 bg-secondary/10 rounded-2xl flex items-center justify-center text-secondary group-hover:rotate-6 transition-transform">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <span
                            class="text-xs font-black uppercase tracking-[0.2em] text-base-content/30 italic">Momentum</span>
                    </div>

                    <div>
                        <p class="text-[10px] font-black uppercase tracking-widest text-base-content/40 mb-1">Cycle
                            Sessions</p>
                        <h3
                            class="text-4xl font-display font-black bg-gradient-to-r from-secondary to-accent bg-clip-text text-transparent">
                            {{ number_format($monthlyBookings) }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- Active Trainers --}}
        <div class="relative group">
            <div
                class="absolute -inset-0.5 bg-gradient-to-tr from-accent/20 to-primary/20 rounded-[2.5rem] blur opacity-30 group-hover:opacity-50 transition duration-500">
            </div>
            <div
                class="relative bg-base-100/40 backdrop-blur-2xl p-8 rounded-[2.5rem] border border-base-content/5 shadow-2xl overflow-hidden group-hover:-translate-y-1 transition-all duration-500">
                <div
                    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-24 h-24 bg-accent/5 rounded-full blur-3xl group-hover:scale-150 transition-transform duration-700">
                </div>

                <div class="relative flex flex-col h-full">
                    <div class="flex items-center justify-between mb-6">
                        <div
                            class="w-14 h-14 bg-accent/10 rounded-2xl flex items-center justify-center text-accent group-hover:rotate-6 transition-transform">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <span
                            class="text-xs font-black uppercase tracking-[0.2em] text-base-content/30 italic">Operators</span>
                    </div>

                    <div>
                        <p class="text-[10px] font-black uppercase tracking-widest text-base-content/40 mb-1">Elite
                            Personnel</p>
                        <h3
                            class="text-4xl font-display font-black bg-gradient-to-r from-accent to-primary bg-clip-text text-transparent">
                            {{ number_format($activeTrainers) }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- Est. Revenue --}}
        <div class="relative group">
            <div
                class="absolute -inset-0.5 bg-gradient-to-tr from-primary/30 to-accent/30 rounded-[2.5rem] blur opacity-40 group-hover:opacity-60 transition duration-500">
            </div>
            <div
                class="relative bg-base-100/40 backdrop-blur-2xl p-8 rounded-[2.5rem] border border-base-content/5 shadow-2xl overflow-hidden group-hover:-translate-y-1 transition-all duration-500">
                <div
                    class="absolute inset-0 bg-gradient-to-tr from-primary/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                </div>

                <div class="relative flex flex-col h-full">
                    <div class="flex items-center justify-between mb-6">
                        <div
                            class="w-14 h-14 bg-success/10 rounded-2xl flex items-center justify-center text-success group-hover:rotate-6 transition-transform">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span
                            class="text-xs font-black uppercase tracking-[0.2em] text-base-content/30 italic">Capital</span>
                    </div>

                    <div>
                        <p class="text-[10px] font-black uppercase tracking-widest text-base-content/40 mb-1">Projected
                            Inflow</p>
                        <h3 class="text-3xl font-display font-black text-white">
                            ${{ number_format($currentMonthRevenue, 2) }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
        <!-- Main Activity Column -->
        <div class="lg:col-span-8 space-y-12">
            {{-- Upcoming Schedule Feed --}}
            <div class="relative group">
                <div
                    class="absolute -inset-1 bg-gradient-to-r from-primary/10 via-secondary/10 to-accent/10 rounded-[3rem] blur-2xl opacity-50">
                </div>
                <div
                    class="relative bg-base-100/60 backdrop-blur-xl rounded-[3rem] border border-base-content/5 shadow-2xl overflow-hidden">
                    <div
                        class="px-10 py-8 border-b border-base-content/5 flex items-center justify-between bg-gradient-to-r from-base-content/5 to-transparent">
                        <div>
                            <h3
                                class="text-2xl font-display font-black uppercase tracking-tighter text-base-content italic">
                                Operational Schedule</h3>
                            <p class="text-xs font-black uppercase tracking-[0.3em] text-base-content/30 mt-1">Next
                                Phase Synchronizations</p>
                        </div>
                        <div class="w-12 h-12 bg-base-content/5 rounded-2xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>

                    <div class="p-10 space-y-6">
                        @forelse($upcomingClasses as $class)
                            <div
                                class="group/item relative flex items-center gap-6 p-6 rounded-3xl bg-base-content/5 border border-transparent hover:border-primary/20 hover:bg-primary/5 transition-all duration-300">
                                <div class="flex-shrink-0">
                                    <div class="relative">
                                        <div
                                            class="w-16 h-16 rounded-2xl overflow-hidden border-2 border-base-content/10 group-hover/item:border-primary/30 transition-colors">
                                            <img src="{{ $class->workoutClass->trainer->user->profile_photo_url }}"
                                                class="w-full h-full object-cover">
                                        </div>
                                        <div
                                            class="absolute -bottom-1 -right-1 w-6 h-6 bg-primary rounded-lg flex items-center justify-center border-2 border-base-100">
                                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-1 min-w-0">
                                    <h4
                                        class="text-lg font-bold text-base-content truncate group-hover/item:text-primary transition-colors">
                                        {{ $class->workoutClass->name }}</h4>
                                    <p class="text-xs font-black uppercase tracking-widest text-base-content/40">
                                        Op: {{ $class->workoutClass->trainer->user->name }} • <span
                                            class="text-primary/70">{{ $class->start_time->format('H:i') }} HRS</span>
                                    </p>
                                </div>

                                <div class="text-right">
                                    <div class="text-xs font-black text-primary/60 uppercase tracking-tighter mb-1">
                                        {{ $class->start_time->format('M d') }}</div>
                                    <span
                                        class="inline-flex px-3 py-1 bg-primary/10 rounded-full text-[10px] font-black uppercase tracking-widest text-primary">
                                        {{ $class->start_time->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-12">
                                <p class="text-xs font-black uppercase tracking-[0.4em] text-base-content/20">Zero Active
                                    Schedule</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            {{-- Newest Members Table --}}
            <div
                class="bg-base-100/40 backdrop-blur-xl rounded-[3rem] border border-base-content/5 shadow-2xl overflow-hidden">
                <div
                    class="px-10 py-8 border-b border-base-content/5 bg-gradient-to-r from-emerald-500/5 to-transparent">
                    <h3 class="text-xl font-display font-black uppercase tracking-tighter text-base-content italic">
                        Recent Inductees</h3>
                    <p class="text-xs font-black uppercase tracking-[0.3em] text-base-content/30 mt-1">Latest biological
                        units Added</p>
                </div>
                <div class="p-4 md:p-10">
                    <div class="space-y-4">
                        @forelse($recentMembers as $member)
                            <div
                                class="flex items-center justify-between p-4 rounded-2xl hover:bg-base-content/5 group-hover:translate-x-1 transition-all">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-xl bg-gradient-to-tr from-emerald-500 to-teal-500 p-0.5">
                                        <div
                                            class="w-full h-full rounded-[0.7rem] bg-base-100 flex items-center justify-center overflow-hidden">
                                            @if($member->profile_photo)
                                                <img src="{{ $member->profile_photo_url }}" class="w-full h-full object-cover">
                                            @else
                                                <span
                                                    class="text-sm font-black text-emerald-500">{{ substr($member->name, 0, 1) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-bold text-base-content">{{ $member->name }}</p>
                                        <p class="text-[10px] font-black uppercase tracking-widest text-base-content/40">
                                            {{ $member->email }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="text-[10px] font-black uppercase tracking-widest text-base-content/30">
                                        {{ $member->created_at->format('d M') }}</div>
                                    <div class="text-xs font-bold text-emerald-500/60 uppercase">
                                        {{ $member->created_at->diffForHumans(null, true) }} ago</div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center py-6 text-base-content/20 uppercase font-black tracking-widest text-xs">
                                Awaiting Induction</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- System Feed Column -->
        <div class="lg:col-span-4 space-y-12">
            <div class="sticky top-12 space-y-12">
                {{-- Live Activity Log --}}
                <div class="relative group">
                    <div
                        class="absolute -inset-0.5 bg-gradient-to-b from-primary/20 to-secondary/20 rounded-[3rem] blur-xl opacity-30">
                    </div>
                    <div
                        class="relative bg-base-100/60 backdrop-blur-xl rounded-[3rem] border border-base-content/5 shadow-2xl overflow-hidden flex flex-col max-h-[850px]">
                        <div class="px-8 py-8 border-b border-base-content/5">
                            <div class="flex items-center gap-3">
                                <div class="w-2 h-2 rounded-full bg-primary animate-ping"></div>
                                <h3
                                    class="text-lg font-display font-black uppercase tracking-tighter text-base-content italic">
                                    Alpha Feed</h3>
                            </div>
                            <p class="text-[10px] font-black uppercase tracking-[0.3em] text-base-content/30 mt-1">
                                Real-time Node Activity</p>
                        </div>

                        <div class="flex-1 p-8 space-y-8 overflow-y-auto custom-scrollbar">
                            @forelse($recentActivity as $activity)
                                <div class="relative pl-8 border-l border-base-content/10">
                                    <div
                                        class="absolute left-0 top-0 -translate-x-1/2 w-3 h-3 rounded-full bg-primary border-2 border-base-100 shadow-[0_0_10px_rgba(var(--p),0.5)]">
                                    </div>

                                    <div class="space-y-2">
                                        <div class="text-[10px] font-black uppercase tracking-widest text-primary/70">
                                            {{ $activity->created_at->diffForHumans() }}
                                        </div>
                                        <p class="text-sm leading-relaxed text-base-content/80">
                                            <span class="font-bold text-base-content">{{ $activity->user->name }}</span>
                                            committed to
                                            <span
                                                class="font-bold text-primary">{{ $activity->schedule->workoutClass->name }}</span>
                                        </p>
                                        <div class="flex items-center gap-2 px-3 py-1.5 bg-base-content/5 rounded-xl w-fit">
                                            <svg class="w-3 h-3 text-base-content/40" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span
                                                class="text-[10px] font-black uppercase tracking-widest text-base-content/40">
                                                {{ $activity->schedule->start_time->format('H:i') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div
                                    class="text-center py-8 opacity-20 italic text-xs uppercase tracking-widest font-black">
                                    Passive State
                                </div>
                            @endforelse
                        </div>

                        <div class="p-6 bg-gradient-to-t from-base-content/5 to-transparent flex justify-center">
                            <span
                                class="text-[10px] font-black uppercase tracking-widest text-base-content/20 italic">End
                                of Log</span>
                        </div>
                    </div>
                </div>

                {{-- Status Monitor --}}
                <div class="bg-primary/5 rounded-[2.5rem] p-8 border border-primary/10">
                    <h4 class="text-xs font-black uppercase tracking-[0.3em] text-primary mb-6">System Health</h4>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center text-[10px] font-black uppercase tracking-widest">
                            <span class="text-base-content/40">API Status</span>
                            <span class="text-success">Optimal</span>
                        </div>
                        <div class="w-full bg-base-content/5 h-1.5 rounded-full overflow-hidden">
                            <div class="bg-primary h-full w-[94%]" style="box-shadow: 0 0 10px rgba(var(--p), 0.3)">
                            </div>
                        </div>
                        <div class="flex justify-between items-center text-[10px] font-black uppercase tracking-widest">
                            <span class="text-base-content/40">Node Load</span>
                            <span class="text-primary">Low Heat</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(var(--bc), 0.1);
            border-radius: 10px;
        }
    </style>
</div>