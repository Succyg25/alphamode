<div class="font-sans antialiased text-base-content min-h-screen">
    <!-- Floating Background Elements (Glassmorphism effect) -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none -z-10">
        <div class="absolute top-20 -left-40 w-80 h-80 bg-primary/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute top-1/3 -right-40 w-96 h-96 bg-secondary/10 rounded-full blur-3xl animate-pulse"
            style="animation-delay: 1s;"></div>
        <div class="absolute bottom-20 left-1/3 w-72 h-72 bg-accent/10 rounded-full blur-3xl animate-pulse"
            style="animation-delay: 2s;"></div>
    </div>

    <!-- Main Content Header -->
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-4xl font-display font-bold text-base-content mb-2">
                    Welcome back, <span
                        class="bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">{{ explode(' ', Auth::user()->name)[0] }}</span>!
                </h1>
                <div class="flex flex-wrap items-center gap-4 text-sm text-base-content/70">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        <span><strong>Member Verified</strong></span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-base-content/40" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Member since {{ Auth::user()->created_at->format('M Y') }}</span>
                    </div>
                </div>
            </div>

            @if(!$upcomingClasses->isEmpty())
                <div class="text-right hidden md:block">
                    <p class="text-xs text-base-content/50 uppercase tracking-widest font-bold">Next Session In</p>
                    <p class="text-xl font-display font-bold text-primary">
                        {{ $upcomingClasses->first()->schedule->start_time->diffForHumans() }}</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Membership Status Card -->
        <div class="relative group">
            <div
                class="absolute -inset-0.5 bg-gradient-to-r from-primary to-secondary rounded-2xl blur opacity-10 group-hover:opacity-20 transition">
            </div>
            <div class="relative bg-base-100 p-6 rounded-2xl border border-base-content/5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-base-content/60 font-medium font-display">Membership Status</p>
                        @if(Auth::user()->currentPlan)
                            <p class="text-2xl font-bold text-base-content mt-1">{{ Auth::user()->currentPlan->name }}</p>
                            <span class="badge badge-success badge-sm mt-2">Active</span>
                        @else
                            <p class="text-2xl font-bold text-base-content mt-1">No Plan</p>
                            <span class="badge badge-ghost badge-sm mt-2">Inactive</span>
                        @endif
                    </div>
                    <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upcoming Sessions Card -->
        <div class="relative group">
            <div
                class="absolute -inset-0.5 bg-gradient-to-r from-secondary to-accent rounded-2xl blur opacity-10 group-hover:opacity-20 transition">
            </div>
            <div class="relative bg-base-100 p-6 rounded-2xl border border-base-content/5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-base-content/60 font-medium font-display">Upcoming Classes</p>
                        <p class="text-3xl font-bold text-base-content mt-1">{{ $upcomingClasses->count() }}</p>
                        <p class="text-xs text-secondary font-semibold mt-1">Booked sessions</p>
                    </div>
                    <div class="w-12 h-12 bg-secondary/10 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-secondary" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Workout History Card -->
        <div class="relative group">
            <div
                class="absolute -inset-0.5 bg-gradient-to-r from-accent to-primary rounded-2xl blur opacity-10 group-hover:opacity-20 transition">
            </div>
            <div class="relative bg-base-100 p-6 rounded-2xl border border-base-content/5 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-base-content/60 font-medium font-display">Total Workouts</p>
                        <p class="text-3xl font-bold text-base-content mt-1">{{ $recentActivity->count() }}</p>
                        <p class="text-xs text-accent font-semibold mt-1">Lifetime activity</p>
                    </div>
                    <div class="w-12 h-12 bg-accent/10 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-accent" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Column (2/3) -->
        <div class="lg:col-span-2 space-y-8">

            <!-- Featured Action Card (Quick Booking) -->
            @if($upcomingClasses->isEmpty())
                <div class="relative group">
                    <div
                        class="absolute -inset-1 bg-gradient-to-r from-primary via-secondary to-accent rounded-3xl blur-xl opacity-20">
                    </div>
                    <div
                        class="relative bg-base-100/80 backdrop-blur-xl p-8 rounded-3xl border border-base-content/5 text-center overflow-hidden">
                        <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 bg-primary/5 rounded-full blur-3xl">
                        </div>
                        <div class="relative max-w-lg mx-auto">
                            <div class="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="w-10 h-10 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                            </div>
                            <h2 class="text-3xl font-display font-bold text-base-content mb-4">Ready to train?</h2>
                            <p class="text-lg text-base-content/70 mb-8">
                                You haven't booked any sessions yet. Check out our expert trainers and start your fitness
                                journey today!
                            </p>
                            <a href="{{ route('trainers') }}"
                                class="btn btn-primary btn-lg rounded-xl shadow-lg shadow-primary/25 transform hover:-translate-y-1 transition-all">
                                Explore Trainers
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <!-- Highlighted Next Class -->
                @php $nextClass = $upcomingClasses->first(); @endphp
                <div class="relative group">
                    <div
                        class="absolute -inset-1 bg-gradient-to-r from-primary to-secondary rounded-3xl blur-xl opacity-20">
                    </div>
                    <div
                        class="relative bg-base-100 p-8 rounded-3xl border border-base-content/5 shadow-xl overflow-hidden">
                        <div class="flex flex-col md:flex-row gap-8 items-center">
                            <div
                                class="w-32 h-32 rounded-2xl bg-primary/10 flex flex-col items-center justify-center text-primary border border-primary/20 flex-shrink-0">
                                <span
                                    class="text-sm font-bold uppercase">{{ $nextClass->schedule->start_time->format('M') }}</span>
                                <span
                                    class="text-5xl font-display font-black leading-none">{{ $nextClass->schedule->start_time->format('d') }}</span>
                            </div>
                            <div class="flex-1 text-center md:text-left">
                                <div class="flex items-center justify-center md:justify-start gap-2 mb-2">
                                    <span class="badge badge-primary badge-outline badge-sm">Next Session</span>
                                    <span
                                        class="text-xs font-bold text-base-content/40 uppercase tracking-widest">{{ $nextClass->schedule->start_time->format('H:i') }}
                                        - {{ $nextClass->schedule->end_time->format('H:i') }}</span>
                                </div>
                                <h2 class="text-3xl font-display font-bold text-base-content mb-1">
                                    {{ $nextClass->schedule->workoutClass->name }}
                                </h2>
                                <p
                                    class="text-base-content/60 text-lg mb-4 flex items-center justify-center md:justify-start gap-2">
                                    <svg class="w-5 h-5 text-secondary" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    With {{ $nextClass->schedule->workoutClass->trainer->user->name }}
                                </p>
                                <div class="flex flex-wrap gap-3 justify-center md:justify-start">
                                    <button class="btn btn-primary btn-md rounded-xl">View Details</button>
                                    <button class="btn btn-ghost btn-md rounded-xl">Reschedule</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Workout History Table -->
            <div class="relative group">
                <div
                    class="absolute -inset-0.5 bg-gradient-to-r from-base-content/5 to-base-content/10 rounded-3xl blur opacity-20">
                </div>
                <div class="relative bg-base-100 p-8 rounded-3xl border border-base-content/5 shadow-lg">
                    <div class="flex items-center justify-between mb-8">
                        <h2 class="text-2xl font-display font-bold text-base-content">Workout History</h2>
                        <a href="#" class="link link-primary text-sm font-bold no-underline hover:underline">See All</a>
                    </div>

                    @if($recentActivity->isEmpty())
                        <div
                            class="text-center py-12 bg-base-200/50 rounded-2xl border border-dashed border-base-content/10">
                            <p class="text-base-content/50">No workout records found yet.</p>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="table w-full border-separate border-spacing-y-3">
                                <thead>
                                    <tr class="text-base-content/40 uppercase text-xs tracking-widest border-none">
                                        <th class="bg-transparent pl-4 border-none">Workout</th>
                                        <th class="bg-transparent border-none">Trainer</th>
                                        <th class="bg-transparent border-none">Date & Time</th>
                                        <th class="bg-transparent text-right pr-4 border-none">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentActivity->take(5) as $activity)
                                        <tr class="bg-base-200/30 hover:bg-base-200/60 transition-colors group/row border-none">
                                            <td class="rounded-l-2xl pl-4 border-none">
                                                <div class="flex items-center gap-3">
                                                    <div
                                                        class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center text-primary group-hover/row:bg-primary group-hover/row:text-primary-content transition-all">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                                        </svg>
                                                    </div>
                                                    <span
                                                        class="font-bold text-base-content">{{ $activity->schedule->workoutClass->name }}</span>
                                                </div>
                                            </td>
                                            <td class="border-none">
                                                <span
                                                    class="font-medium text-base-content/70">{{ $activity->schedule->workoutClass->trainer->user->name }}</span>
                                            </td>
                                            <td class="border-none whitespace-nowrap">
                                                <div class="flex flex-col">
                                                    <span
                                                        class="text-sm font-bold text-base-content">{{ $activity->schedule->start_time->format('M d, Y') }}</span>
                                                    <span
                                                        class="text-xs text-base-content/40">{{ $activity->schedule->start_time->format('H:i') }}</span>
                                                </div>
                                            </td>
                                            <td class="rounded-r-2xl text-right pr-4 border-none">
                                                <button
                                                    class="btn btn-ghost btn-sm btn-square rounded-lg group-hover/row:bg-primary/20 group-hover/row:text-primary transition-all">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M9 5l7 7-7 7" />
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

        <!-- Sidebar Column (1/3) -->
        <div class="space-y-6">

            <!-- Plan Details Card -->
            <div class="relative group">
                <div
                    class="absolute -inset-0.5 bg-gradient-to-r from-primary to-accent rounded-3xl blur opacity-10 transition">
                </div>
                <div class="relative bg-base-100 p-8 rounded-3xl border border-base-content/5 shadow-lg">
                    <h3 class="font-display font-bold text-xl text-base-content mb-6 flex items-center gap-3">
                        <svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                clip-rule="evenodd" />
                        </svg>
                        Current Plan
                    </h3>
                    @if(Auth::user()->currentPlan)
                        <div class="space-y-4">
                            <div class="p-4 rounded-2xl bg-primary/5 border border-primary/10">
                                <p class="text-xs text-primary font-bold uppercase tracking-wider mb-1">Your Subscription
                                </p>
                                <p class="text-2xl font-display font-black text-base-content">
                                    {{ Auth::user()->currentPlan->name }}</p>
                            </div>
                            <div class="space-y-3 text-sm pt-2">
                                <div class="flex justify-between items-center py-2 border-b border-base-content/5">
                                    <span class="text-base-content/60">Renewal Date</span>
                                    <span class="font-bold text-base-content">Monthly</span>
                                </div>
                                <div class="flex justify-between items-center py-2">
                                    <span class="text-base-content/60">Status</span>
                                    <span class="text-success font-bold">● Active</span>
                                </div>
                            </div>
                            <a href="{{ route('subscription') }}"
                                class="btn btn-outline btn-primary btn-block rounded-xl mt-4">Manage Subscription</a>
                        </div>
                    @else
                        <div class="text-center py-6">
                            <p class="text-base-content/60 mb-6 italic">No active subscription found.</p>
                            <a href="{{ route('plans') }}" class="btn btn-primary btn-block rounded-xl">View Membership
                                Plans</a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Profile Info Card -->
            <div class="relative group">
                <div
                    class="absolute -inset-0.5 bg-gradient-to-r from-secondary to-primary rounded-3xl blur opacity-10 transition">
                </div>
                <div class="relative bg-base-100 p-8 rounded-3xl border border-base-content/5 shadow-lg">
                    <h3 class="font-display font-bold text-xl text-base-content mb-6">Quick Actions</h3>
                    <div class="space-y-3">
                        <a href="{{ route('profile') }}"
                            class="flex items-center justify-between p-4 rounded-2xl bg-base-200/50 hover:bg-primary/5 hover:text-primary transition-all group/action border border-transparent hover:border-primary/10">
                            <span class="font-bold">Edit Profile</span>
                            <svg class="w-5 h-5 group-hover/action:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                        <a href="{{ route('subscription') }}"
                            class="flex items-center justify-between p-4 rounded-2xl bg-base-200/50 hover:bg-secondary/5 hover:text-secondary transition-all group/action border border-transparent hover:border-secondary/10">
                            <span class="font-bold">Payment Methods</span>
                            <svg class="w-5 h-5 group-hover/action:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center justify-between p-4 rounded-2xl bg-base-200/50 hover:bg-accent/5 hover:text-accent transition-all group/action border border-transparent hover:border-accent/10">
                            <span class="font-bold">Workout History</span>
                            <svg class="w-5 h-5 group-hover/action:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Need Help? Card -->
            <div
                class="bg-gradient-to-br from-primary to-secondary p-8 rounded-3xl text-primary-content shadow-xl relative overflow-hidden group">
                <div
                    class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 bg-white/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700">
                </div>
                <div class="relative z-10">
                    <h3 class="font-display font-black text-2xl mb-2">Need Help?</h3>
                    <p class="text-primary-content/80 text-sm mb-6">Have questions about your plan or workout schedule?
                        Our support team is here for you.</p>
                    <a href="{{ route('contact') }}"
                        class="btn btn-white bg-white text-primary hover:bg-white/90 border-none rounded-xl font-bold">Contact
                        Support</a>
                </div>
            </div>
        </div>
    </div>
</div>