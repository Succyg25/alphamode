<div class="relative min-h-screen py-20 px-4 overflow-hidden">
    <!-- Cosmic Background Elements -->
    <div class="absolute inset-0 z-0">
        <div class="absolute top-1/4 -left-20 w-96 h-96 bg-primary/10 rounded-full blur-[120px] animate-pulse"></div>
        <div class="absolute bottom-1/4 -right-20 w-96 h-96 bg-accent/10 rounded-full blur-[120px] animate-pulse"
            style="animation-delay: 2s;"></div>
    </div>

    <!-- Background Decoration Text -->
    <div class="absolute top-40 left-10 pointer-events-none select-none z-0">
        <span class="text-[12rem] font-black uppercase tracking-tighter text-base-content/[0.02] italic leading-none">
            RESERVATION
        </span>
    </div>
    <div class="absolute bottom-40 right-10 pointer-events-none select-none z-0">
        <span
            class="text-[12rem] font-black uppercase tracking-tighter text-base-content/[0.02] italic leading-none text-right block">
            ENGAGEMENT
        </span>
    </div>

    <div class="max-w-5xl mx-auto relative z-10">
        <!-- Header Section -->
        <div class="mb-16 text-center">
            <h2 class="text-xs font-black uppercase tracking-[0.4em] text-primary mb-4 italic">Protocol Engagement</h2>
            <h1
                class="text-6xl font-display font-black italic uppercase tracking-tighter bg-gradient-to-r from-primary via-secondary to-accent bg-clip-text text-transparent mb-6">
                Book with {{ $trainer->user->name }}
            </h1>
            <p class="text-base-content/60 max-w-2xl mx-auto uppercase tracking-widest text-sm font-bold italic">
                Select a temporal window for your upcoming physical induction.
            </p>
        </div>

        @if($step === 1)
            <!-- Step 1: Schedule Selection -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($schedules as $schedule)
                    <div class="group relative">
                        <div
                            class="absolute -inset-0.5 bg-gradient-to-br from-primary/30 to-accent/30 rounded-3xl blur opacity-0 group-hover:opacity-100 transition duration-500">
                        </div>
                        <div
                            class="relative flex flex-col h-full bg-base-100/40 backdrop-blur-2xl border border-base-content/5 rounded-3xl p-8 hover:translate-y-[-4px] transition-all duration-300">
                            <!-- Class Identifier -->
                            <div class="flex items-center justify-between mb-6">
                                <span
                                    class="px-3 py-1 bg-primary/10 text-primary text-[10px] font-black uppercase tracking-widest rounded-lg italic">
                                    {{ $schedule->workoutClass->name }}
                                </span>
                                <div class="w-2 h-2 rounded-full bg-primary animate-ping"></div>
                            </div>

                            <!-- Temporal Details -->
                            <div class="mb-8">
                                <h3
                                    class="text-2xl font-display font-black italic uppercase tracking-tighter text-base-content mb-2">
                                    {{ $schedule->start_time->format('l, M d') }}
                                </h3>
                                <div class="flex items-center gap-2 text-base-content/60 font-bold italic text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $schedule->start_time->format('h:i A') }} - {{ $schedule->end_time->format('h:i A') }}
                                </div>
                            </div>

                            <!-- Capacity Signal -->
                            <div class="mt-auto pt-6 border-t border-base-content/5 flex items-center justify-between">
                                <div class="flex flex-col">
                                    <span
                                        class="text-[10px] font-black uppercase tracking-widest text-base-content/40 italic">Capacity</span>
                                    <span
                                        class="text-lg font-display font-black italic text-primary">{{ $schedule->workoutClass->capacity }}
                                        Units</span>
                                </div>
                                <button wire:click="selectSchedule({{ $schedule->id }})"
                                    class="h-12 px-6 bg-primary hover:bg-primary-focus text-primary-content font-black uppercase tracking-widest italic rounded-2xl shadow-xl shadow-primary/20 transition-all hover:scale-105 active:scale-95">
                                    Init Selection
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div
                        class="col-span-full h-64 flex flex-col items-center justify-center bg-base-100/20 backdrop-blur-xl border border-base-content/5 border-dashed rounded-[3rem]">
                        <p class="text-base-content/40 font-black uppercase tracking-[0.2em] italic mb-6">No temporal windows
                            active</p>
                        <a href="{{ route('trainers') }}"
                            class="h-12 px-8 flex items-center bg-base-content/5 hover:bg-base-content/10 text-base-content font-black uppercase tracking-widest italic rounded-2xl transition-all">
                            Return to Personnel
                        </a>
                    </div>
                @endforelse
            </div>
        @elseif($step === 2)
            <!-- Step 2: Confirmation Sanctuary -->
            <div class="max-w-2xl mx-auto">
                <div class="relative group">
                    <div
                        class="absolute -inset-1 bg-gradient-to-r from-primary/30 to-accent/30 rounded-[3rem] blur-2xl opacity-50 group-hover:opacity-100 transition duration-1000">
                    </div>
                    <div
                        class="relative bg-base-100/60 backdrop-blur-3xl border border-base-content/10 rounded-[3rem] p-12 overflow-hidden">

                        <!-- Header Signal -->
                        <div class="flex items-center gap-4 mb-12">
                            <div
                                class="w-16 h-16 bg-gradient-to-tr from-primary to-accent rounded-3xl flex items-center justify-center p-0.5 animate-pulse">
                                <div
                                    class="w-full h-full bg-base-100/80 backdrop-blur rounded-[1.3rem] flex items-center justify-center">
                                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3
                                    class="text-3xl font-display font-black italic uppercase tracking-tighter text-base-content">
                                    Validate Engagement
                                </h3>
                                <p class="text-base-content/40 font-bold uppercase tracking-widest text-[10px] italic">Final
                                    induction confirmation</p>
                            </div>
                        </div>

                        <!-- Data Fields -->
                        <div class="space-y-6 mb-12">
                            <div
                                class="flex items-center justify-between p-6 bg-base-content/5 rounded-2xl border border-base-content/5">
                                <span
                                    class="text-[10px] font-black uppercase tracking-widest text-base-content/40 italic">Assigned
                                    Unit</span>
                                <span
                                    class="text-xl font-display font-black italic text-base-content uppercase tracking-tight">{{ $selectedSchedule->workoutClass->name }}</span>
                            </div>
                            <div
                                class="flex items-center justify-between p-6 bg-base-content/5 rounded-2xl border border-base-content/5">
                                <span
                                    class="text-[10px] font-black uppercase tracking-widest text-base-content/40 italic">Lead
                                    Personnel</span>
                                <span
                                    class="text-xl font-display font-black italic text-primary uppercase tracking-tight">{{ $trainer->user->name }}</span>
                            </div>
                            <div
                                class="flex items-center justify-between p-6 bg-base-content/5 rounded-2xl border border-base-content/5">
                                <span
                                    class="text-[10px] font-black uppercase tracking-widest text-base-content/40 italic">Temporal
                                    Slot</span>
                                <div class="text-right">
                                    <div
                                        class="text-xl font-display font-black italic text-base-content uppercase tracking-tight">
                                        {{ $selectedSchedule->start_time->format('l, M d, Y') }}</div>
                                    <div class="text-[11px] font-black text-primary uppercase tracking-widest italic">
                                        {{ $selectedSchedule->start_time->format('H:i') }} -
                                        {{ $selectedSchedule->end_time->format('H:i') }} HRS</div>
                                </div>
                            </div>
                        </div>

                        <!-- Requirement Protocol -->
                        <div class="flex items-start gap-4 p-6 bg-primary/5 border border-primary/10 rounded-2xl mb-12">
                            <div class="w-10 h-10 rounded-xl bg-primary/20 flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="flex flex-col">
                                <span
                                    class="text-[10px] font-black uppercase tracking-widest text-primary italic mb-1">Induction
                                    Protocol</span>
                                <p class="text-sm font-bold text-base-content/60 italic leading-relaxed">Please ensure
                                    arrival exactly 15 minutes prior to induction start for synchronization.</p>
                            </div>
                        </div>

                        <!-- Action Controls -->
                        <div class="flex flex-col sm:flex-row gap-4">
                            <button wire:click="confirmBooking"
                                class="flex-1 h-16 bg-gradient-to-r from-primary to-accent hover:scale-[1.02] active:scale-[0.98] text-primary-content font-black uppercase tracking-[0.2em] italic rounded-2xl shadow-2xl shadow-primary/20 transition-all duration-300">
                                Validate Engagement
                            </button>
                            <button wire:click="$set('step', 1)"
                                class="h-16 px-8 bg-base-content/5 hover:bg-base-content/10 text-base-content/40 hover:text-base-content font-black uppercase tracking-widest italic rounded-2xl transition-all duration-300">
                                Decline Protocol
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>