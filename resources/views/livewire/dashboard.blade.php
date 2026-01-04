<div class="font-sans antialiased text-base-content min-h-screen py-8">
    <!-- Floating Background Elements (Glassmorphism effect) -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none -z-10">
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-secondary/10 rounded-full blur-3xl animate-pulse"
            style="animation-delay: 2s;"></div>
    </div>

    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12 relative px-4 md:px-0">
        <div class="space-y-2">
            <div class="flex items-center gap-3">
                <span
                    class="px-3 py-1 bg-primary/10 text-primary text-[10px] font-bold uppercase tracking-wider rounded-full border border-primary/20">
                    Official Member
                </span>
                <span class="text-[10px] font-bold text-base-content/40 tracking-wider">Session ID:
                    #{{ substr(Auth::id(), 0, 8) }}</span>
            </div>
            <h1
                class="text-4xl md:text-5xl font-display font-black tracking-tight bg-gradient-to-r from-primary via-secondary to-accent bg-clip-text text-transparent">
                Welcome back, {{ explode(' ', Auth::user()->name)[0] }}
            </h1>
            <p class="text-base-content/60 font-medium text-lg">Your next peak performance starts now.</p>
        </div>

        @if(!$upcomingClasses->isEmpty())
            <div
                class="p-6 bg-base-100/50 backdrop-blur-xl rounded-3xl border border-base-content/5 shadow-2xl transition-all hover:scale-105 duration-300">
                <div class="text-right hidden md:block">
                    <p class="text-xs text-base-content/50 uppercase tracking-widest font-bold">Next Session In</p>
                    <p class="text-xl font-display font-bold text-primary">
                        {{ $upcomingClasses->first()->schedule->start_time->diffForHumans() }}
                    </p>
                </div>
            </div>
        @endif
    </div>

    <!-- Stats Dashboard -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12 px-4 md:px-0">
        <!-- Membership Card -->
        <div class="group relative">
            <div
                class="absolute -inset-1 bg-gradient-to-r from-primary to-secondary rounded-[2rem] blur opacity-25 group-hover:opacity-40 transition duration-500">
            </div>
            <div
                class="relative flex flex-col items-center justify-center p-8 bg-base-100/80 backdrop-blur-xl rounded-[2rem] border border-base-content/5 shadow-xl">
                <div
                    class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center text-primary mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                    </svg>
                </div>
                <p class="text-xs font-bold text-base-content/40 mb-1">Membership Status</p>
                <p
                    class="text-2xl font-display font-black {{ Auth::user()->isActive() ? 'text-success' : (Auth::user()->isPending() ? 'text-warning' : 'text-error') }}">
                    {{ Auth::user()->isActive() ? 'ACTIVE' : (Auth::user()->isPending() ? 'PENDING' : 'INACTIVE') }}
                </p>
            </div>
        </div>

        <!-- Upcoming Classes Card -->
        <div class="group relative">
            <div
                class="absolute -inset-1 bg-gradient-to-r from-secondary to-accent rounded-[2.5rem] blur opacity-25 group-hover:opacity-40 transition duration-500">
            </div>
            <div
                class="relative flex flex-col items-center justify-center p-8 bg-base-100/80 backdrop-blur-xl rounded-[2rem] border border-base-content/5 shadow-xl">
                <div
                    class="w-16 h-16 rounded-2xl bg-secondary/10 flex items-center justify-center text-secondary mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <p class="text-xs font-bold text-base-content/40 mb-1">Upcoming Classes</p>
                <p class="text-2xl font-display font-black text-base-content">
                    {{ $upcomingClasses->count() }} SESSION{{ $upcomingClasses->count() !== 1 ? 'S' : '' }}
                </p>
            </div>
        </div>

        <!-- Total Workouts Card -->
        <div class="group relative">
            <div
                class="absolute -inset-1 bg-gradient-to-r from-accent to-primary rounded-[2.5rem] blur opacity-25 group-hover:opacity-40 transition duration-500">
            </div>
            <div
                class="relative flex flex-col items-center justify-center p-8 bg-base-100/80 backdrop-blur-xl rounded-[2.5rem] border border-base-content/5 shadow-xl">
                <div
                    class="w-16 h-16 rounded-2xl bg-accent/10 flex items-center justify-center text-accent mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <p class="text-xs font-bold text-base-content/40 mb-1">Total Workouts</p>
                <p class="text-2xl font-display font-black text-base-content">
                    {{ $recentActivity->count() }} COMPLETED
                </p>
            </div>
        </div>
    </div>

    <!-- Layout Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 relative px-4 md:px-0">
        <!-- Main Panel (Left 8 Columns) -->
        <div class="lg:col-span-8 space-y-8">
            <!-- Featured Action Card -->
            @if($upcomingClasses->isEmpty())
                <div
                    class="relative group p-10 rounded-[3rem] bg-gradient-to-br from-primary to-secondary overflow-hidden shadow-2xl">
                    <div
                        class="absolute top-0 right-0 -mr-20 -mt-20 w-80 h-80 bg-white/10 rounded-full blur-3xl transition-transform duration-700 group-hover:scale-110">
                    </div>
                    <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8">
                        <div class="max-w-md text-center md:text-left">
                            <h2 class="text-4xl font-display font-black text-primary-content mb-4 tracking-tight">Ready to
                                train?</h2>
                            <p class="text-primary-content opacity-80 text-lg">Your next milestone is just one booking away.
                                Explore our classes and start your transformation.</p>
                        </div>
                        <a href="{{ route('trainers') }}"
                            class="btn btn-white bg-white text-primary border-none rounded-2xl px-10 font-black uppercase tracking-widest hover:bg-white/90 transform hover:-translate-y-1 transition-all">
                            Explore Trainers
                        </a>
                    </div>
                </div>
            @else
                <!-- Highlight Next Class -->
                @php $nextClass = $upcomingClasses->first(); @endphp
                <div
                    class="relative group p-10 rounded-[3rem] bg-base-100 shadow-2xl border border-base-content/5 overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-primary/10 rounded-full blur-2xl"></div>
                    <div class="relative z-10 flex items-center justify-between gap-6 flex-wrap">
                        <div class="flex items-center gap-6">
                            <div
                                class="w-16 h-16 rounded-2xl bg-primary text-primary-content flex items-center justify-center font-display font-black text-xl shadow-lg shadow-primary/20">
                                {{ $nextClass->schedule->start_time->format('d') }}
                            </div>
                            <div>
                                <h3 class="text-2xl font-display font-black text-base-content">
                                    {{ $nextClass->schedule->workoutClass->name }}</h3>
                                <p class="text-base-content/60 font-medium">with
                                    {{ $nextClass->schedule->workoutClass->trainer->user->name }} •
                                    {{ $nextClass->schedule->start_time->format('H:i') }}</p>
                            </div>
                        </div>
                        <span
                            class="px-6 py-2 bg-primary/10 text-primary font-black text-xs uppercase tracking-widest rounded-full">
                            Next Session
                        </span>
                    </div>
                </div>
            @endif

            <!-- Workout History -->
            <div class="card bg-base-100/50 backdrop-blur-xl shadow-2xl border border-base-content/5 rounded-[2.5rem]">
                <div class="card-body p-8 md:p-10">
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <h2 class="card-title text-2xl font-display font-black">Workout History</h2>
                            <p class="text-sm text-base-content/50 font-medium">Your recent performance records</p>
                        </div>
                        <button class="btn btn-ghost btn-sm text-primary font-black uppercase tracking-widest">View
                            All</button>
                    </div>

                    @if($recentActivity->isEmpty())
                        <div
                            class="bg-base-content/5 border border-dashed border-base-content/20 rounded-3xl p-12 text-center">
                            <p class="text-base-content/60 font-bold uppercase tracking-widest text-sm">No activity recorded
                                yet.</p>
                        </div>
                    @else
                        <div class="overflow-x-auto -mx-8 md:mx-0">
                            <table class="table w-full">
                                <thead>
                                    <tr class="border-b border-base-content/5">
                                        <th
                                            class="bg-transparent text-xs font-black uppercase tracking-widest text-base-content/40 py-6 px-8">
                                            Activity</th>
                                        <th
                                            class="bg-transparent text-xs font-black uppercase tracking-widest text-base-content/40 py-6 px-8">
                                            Trainer</th>
                                        <th
                                            class="bg-transparent text-xs font-black uppercase tracking-widest text-base-content/40 py-6 px-8">
                                            Date</th>
                                        <th class="bg-transparent"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentActivity as $activity)
                                        <tr class="group/row hover:bg-base-content/5 transition-colors">
                                            <td class="bg-transparent border-none py-6 px-8">
                                                <div class="flex items-center gap-4">
                                                    <div
                                                        class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary font-bold">
                                                        {{ substr($activity->schedule->workoutClass->name, 0, 1) }}
                                                    </div>
                                                    <span
                                                        class="font-bold text-base-content">{{ $activity->schedule->workoutClass->name }}</span>
                                                </div>
                                            </td>
                                            <td class="bg-transparent border-none py-6 px-8 text-base-content/70 font-medium">
                                                {{ $activity->schedule->workoutClass->trainer->user->name }}
                                            </td>
                                            <td class="bg-transparent border-none py-6 px-8 text-base-content/50 font-medium">
                                                {{ $activity->schedule->start_time->format('M d, Y') }}
                                            </td>
                                            <td class="bg-transparent border-none py-6 px-8 text-right">
                                                <button
                                                    class="btn btn-ghost btn-circle btn-sm opacity-0 group-hover/row:opacity-100 transition-opacity">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M13 5l7 7m0 0l-7 7m7-7H3" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Sidebar (Right 4 Columns) -->
        <div class="lg:col-span-4 space-y-8">
            <!-- Plan Details -->
            <div class="relative group">
                <div
                    class="absolute -inset-1 bg-gradient-to-tr from-accent to-primary rounded-[2.5rem] blur opacity-30">
                </div>
                <div
                    class="relative card bg-base-100 shadow-2xl border border-base-content/5 rounded-[2.5rem] overflow-hidden">
                    <div class="card-body p-8">
                        <div class="flex items-center justify-between mb-8">
                            <h3 class="text-xl font-display font-black">Plan Details</h3>
                            <div class="w-10 h-10 rounded-xl bg-base-content/5 flex items-center justify-center">
                                <svg class="w-5 h-5 text-base-content/40" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                        </div>

                        @if(Auth::user()->isActive() && Auth::user()->currentPlan)
                            <div class="space-y-6">
                                <div>
                                    <p class="text-xs text-primary font-bold mb-1">Your Subscription</p>
                                    <p class="text-2xl font-display font-black text-base-content">
                                        {{ Auth::user()->currentPlan->name }}
                                    </p>
                                </div>
                                <div class="space-y-3 text-sm pt-2">
                                    <div class="flex justify-between items-center py-2 border-b border-base-content/5">
                                        <span
                                            class="text-[11px] font-bold text-base-content/40 uppercase tracking-wider">Renewal
                                            Date</span>
                                        <span class="font-bold">Next Month</span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-base-content/5">
                                        <span
                                            class="text-[11px] font-bold text-base-content/40 uppercase tracking-wider">Payment
                                            Method</span>
                                        <span class="font-bold">Manual Transfer</span>
                                    </div>
                                </div>
                                <a href="{{ route('subscription') }}"
                                    class="btn btn-outline btn-block rounded-2xl border-2 border-base-content/10 font-bold uppercase tracking-wider h-14 mt-4 text-xs">Manage Plan</a>
                            </div>
                        @elseif(Auth::user()->isPending())
                            <div class="text-center py-6">
                                <p class="text-[11px] font-bold text-base-content/40 mb-4 uppercase tracking-wider">Verification In Progress</p>
                                <div class="inline-flex items-center justify-center p-4 bg-warning/10 text-warning rounded-2xl mb-6">
                                    <svg class="w-8 h-8 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <p class="text-sm font-bold text-base-content mb-6">Your payment is being verified by our team. You'll have access shortly!</p>
                                <button disabled class="btn btn-warning btn-outline btn-block rounded-2xl font-bold uppercase tracking-wider h-14 opacity-50 cursor-not-allowed text-xs">Pending Approval</button>
                            </div>
                        @else
                            <div class="text-center py-6">
                                <p class="text-base-content/40 font-bold mb-6">No active plan found.</p>
                                <a href="{{ route('plans') }}"
                                    class="btn btn-primary btn-block rounded-2xl font-black uppercase tracking-widest h-14 shadow-lg shadow-primary/20">Upgrade
                                    Now</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card bg-base-100/50 backdrop-blur-xl shadow-2xl border border-base-content/5 rounded-[2.5rem]">
                <div class="card-body p-8">
                    <h3 class="text-xl font-display font-black mb-6">Quick Actions</h3>
                    <div class="grid gap-3">
                        <a href="{{ route('profile') }}"
                            class="flex items-center gap-4 p-4 rounded-2xl hover:bg-base-content/5 transition-all group/item">
                            <div
                                class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary group-hover/item:bg-primary group-hover/item:text-primary-content transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <span class="font-bold text-base-content">Edit Profile</span>
                        </a>
                        <a href="{{ route('subscription') }}"
                            class="flex items-center gap-4 p-4 rounded-2xl hover:bg-base-content/5 transition-all group/item">
                            <div
                                class="w-10 h-10 rounded-xl bg-secondary/10 flex items-center justify-center text-secondary group-hover/item:bg-secondary group-hover/item:text-secondary-content transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                </svg>
                            </div>
                            <span class="font-bold text-base-content">Payment Methods</span>
                        </a>
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center gap-4 p-4 rounded-2xl hover:bg-base-content/5 transition-all group/item">
                            <div
                                class="w-10 h-10 rounded-xl bg-accent/10 flex items-center justify-center text-accent group-hover/item:bg-accent group-hover/item:text-accent-content transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="font-bold text-base-content">Workout History</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Need Help? -->
            <div
                class="relative group p-8 rounded-[2.5rem] bg-gradient-to-br from-base-content/10 to-base-100 border border-base-content/5 shadow-xl overflow-hidden text-center">
                <div class="relative z-10">
                    <h4 class="font-display font-black text-lg mb-2">Need Assistance?</h4>
                    <p class="text-sm text-base-content/50 mb-6">Our support team is available 24/7 for our premium
                        members.</p>
                    <a href="{{ route('contact') }}"
                        class="link text-primary font-black uppercase tracking-widest text-xs">Contact Support</a>
                </div>
            </div>
        </div>
    </div>
</div>