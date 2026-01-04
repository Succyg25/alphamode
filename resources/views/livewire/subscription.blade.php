<div class="font-sans antialiased text-base-content min-h-screen py-12">
    <!-- Floating Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none -z-10">
        <div class="absolute top-20 right-0 w-96 h-96 bg-primary/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 left-0 w-96 h-96 bg-secondary/10 rounded-full blur-3xl animate-pulse"
            style="animation-delay: 1.5s;"></div>
    </div>

    <!-- Page Header -->
    <div class="text-center mb-16 relative">
        <div
            class="inline-block px-4 py-1.5 mb-6 text-sm font-bold tracking-widest text-primary uppercase bg-primary/10 rounded-full">
            Membership Settings
        </div>
        <h1
            class="text-5xl font-display font-black mb-6 bg-gradient-to-r from-primary via-secondary to-accent bg-clip-text text-transparent">
            Current Membership
        </h1>
        <p class="text-xl text-base-content/60 max-w-2xl mx-auto leading-relaxed">
            Review your current status, upgrade your experience, or adjust your
            plan settings all in one place.
        </p>
    </div>

    <div class="max-w-5xl mx-auto px-6">
        @if(Auth::user()->currentPlan)
            <!-- Active Subscription View -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12 relative">
                <!-- Status Cards -->
                <div class="relative group">
                    <div
                        class="absolute -inset-1 bg-gradient-to-br from-primary/20 to-primary/5 rounded-3xl blur opacity-50 transition duration-500">
                    </div>
                    <div
                        class="relative bg-base-100/60 backdrop-blur-xl p-8 rounded-3xl border border-base-content/5 shadow-2xl text-center">
                        <p class="text-xs font-bold uppercase tracking-wider text-base-content/40 mb-3">Active Plan</p>
                        <p class="text-3xl font-display font-bold text-primary">{{ Auth::user()->currentPlan->name }}</p>
                    </div>
                </div>

                <div class="relative group">
                    <div
                        class="absolute -inset-1 bg-gradient-to-br from-secondary/20 to-secondary/5 rounded-3xl blur opacity-50 transition duration-500">
                    </div>
                    <div
                        class="relative bg-base-100/60 backdrop-blur-xl p-8 rounded-3xl border border-base-content/5 shadow-2xl text-center">
                        <p class="text-xs font-bold uppercase tracking-wider text-base-content/40 mb-3">Access Period</p>
                        <p class="text-3xl font-display font-bold text-secondary">
                            {{ Auth::user()->currentPlan->duration_days }} Days
                        </p>
                    </div>
                </div>

                <div class="relative group">
                    <div
                        class="absolute -inset-1 bg-gradient-to-br from-accent/20 to-accent/5 rounded-3xl blur opacity-50 transition duration-500">
                    </div>
                    <div
                        class="relative bg-base-100/60 backdrop-blur-xl p-8 rounded-3xl border border-base-content/5 shadow-2xl text-center">
                        <p class="text-xs font-bold uppercase tracking-wider text-base-content/40 mb-3">Monthly Rate
                        </p>
                        <div class="flex items-baseline justify-center gap-1">
                            <span class="text-lg font-bold text-accent">$</span>
                            <span
                                class="text-3xl font-display font-bold text-accent">{{ floor(Auth::user()->currentPlan->price) }}</span>
                            <span
                                class="text-sm font-bold text-accent">.{{ substr(number_format(Auth::user()->currentPlan->price, 2), -2) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Management Panel -->
            <div class="relative group lg:col-span-12">
                <div
                    class="absolute -inset-1.5 bg-gradient-to-tr from-primary/20 via-secondary/20 to-accent/20 rounded-[2.5rem] blur opacity-30">
                </div>
                <div class="relative bg-base-100 p-10 md:p-14 rounded-[2.5rem] border border-base-content/5 shadow-2xl">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-8 mb-12">
                        <div>
                            <h2 class="text-3xl font-display font-black mb-2">Member Settings</h2>
                            <p class="text-base-content/60">Manage your subscription lifecycle and plan preferences.</p>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="w-3 h-3 bg-success rounded-full animate-pulse shadow-sm shadow-success/40"></span>
                            <span class="text-sm font-bold uppercase tracking-wider text-success">Active Plan</span>
                        </div>
                    </div>

                    <!-- Perks Section -->
                    <div class="grid md:grid-cols-2 gap-12 mb-12 border-y border-base-content/5 py-12">
                        <div class="space-y-6">
                            <h3 class="text-sm font-bold uppercase tracking-wider text-primary">Your Membership Perks</h3>
                            <div class="space-y-4">
                                @php
                                    $perks = explode("\n", Auth::user()->currentPlan->description);
                                @endphp
                                @foreach($perks as $perk)
                                    @if(trim($perk))
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="w-6 h-6 rounded-lg bg-success/10 flex items-center justify-center text-success">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                            <span class="font-medium text-base-content/80">{{ trim($perk) }}</span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="p-8 rounded-3xl bg-base-content/5 border border-dashed border-base-content/10">
                            <h3 class="text-sm font-bold uppercase tracking-wider text-base-content/40 mb-4">Motivation</h3>
                            <p class="text-sm text-base-content/60 leading-relaxed italic">
                                "Consistency is the key to transformation. Your current plan gives you all the tools needed
                                to reach your goals. Keep pushing, member!"
                            </p>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex flex-col sm:flex-row gap-6">
                        <a href="{{ route('plans') }}"
                            class="group/btn relative flex-1 h-14 rounded-2xl overflow-hidden shadow-xl transition-all active:scale-95">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-primary to-secondary opacity-90 group-hover:opacity-100">
                            </div>
                            <div class="relative flex items-center justify-center gap-2 h-full">
                                <span
                                    class="font-display font-black uppercase tracking-widest text-sm text-primary-content">
                                    Change Plan
                                </span>
                                <svg class="w-4 h-4 text-primary-content transition-transform group-hover/btn:translate-x-1"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </div>
                        </a>

                        <button wire:click="cancelSubscription"
                            wire:confirm="Are you sure you want to cancel your subscription?"
                            class="group/btn relative flex-1 h-14 rounded-2xl overflow-hidden border-2 border-base-content/10 transition-all hover:bg-base-content/5 active:scale-95">
                            <div class="flex items-center justify-center gap-2 h-full">
                                <span
                                    class="font-display font-black uppercase tracking-widest text-sm text-base-content/40 group-hover/btn:text-error transition-colors">
                                    Cancel Subscription
                                </span>
                                <svg class="w-4 h-4 text-base-content/40 group-hover/btn:text-error transition-colors"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        @else
            <!-- Inactive View -->
            <div class="relative group max-w-2xl mx-auto">
                <div
                    class="absolute -inset-1.5 bg-gradient-to-tr from-error/30 to-warning/30 rounded-[2.5rem] blur opacity-30">
                </div>
                <div class="relative bg-base-100 p-12 rounded-[2.5rem] border border-base-content/5 shadow-2xl text-center">
                    <div
                        class="w-24 h-24 bg-error/10 rounded-full flex items-center justify-center mx-auto mb-8 text-error">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h2 class="text-3xl font-display font-black mb-4 uppercase tracking-tight">No Active Plan</h2>
                    <p class="text-base-content/60 mb-10 leading-relaxed">
                        It looks like you don't have an active subscription right now.
                        Subscribe to a plan to unlock full access to our elite trainers and facilities.
                    </p>
                    <a href="{{ route('plans') }}"
                        class="group/btn relative inline-flex items-center justify-center w-full sm:w-auto px-12 h-16 rounded-2xl overflow-hidden shadow-2xl shadow-primary/20 transition-all active:scale-95">
                        <div class="absolute inset-0 bg-gradient-to-r from-primary via-secondary to-accent"></div>
                        <div class="relative flex items-center gap-3">
                            <span class="font-display font-black uppercase tracking-[0.2em] text-sm text-primary-content">
                                Browse Plans
                            </span>
                            <svg class="w-5 h-5 text-primary-content group-hover/btn:translate-x-1 transition-transform"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>