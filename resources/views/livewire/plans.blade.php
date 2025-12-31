<div class="font-sans antialiased text-base-content min-h-screen py-12">
    <!-- Floating Background Elements (Glassmorphism effect) -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none -z-10">
        <div class="absolute top-40 -right-40 w-96 h-96 bg-primary/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-40 -left-40 w-96 h-96 bg-secondary/10 rounded-full blur-3xl animate-pulse"
            style="animation-delay: 1.5s;"></div>
    </div>

    <div class="text-center mb-20 relative">
        <div
            class="inline-block px-4 py-1.5 mb-6 text-sm font-bold tracking-widest text-primary uppercase bg-primary/10 rounded-full">
            Pricing & Plans
        </div>
        <h1
            class="text-5xl md:text-6xl font-display font-black mb-6 bg-gradient-to-r from-primary via-secondary to-accent bg-clip-text text-transparent">
            Choose Your Tier
        </h1>
        <p class="text-xl text-base-content/60 max-w-2xl mx-auto leading-relaxed">
            Elevate your fitness journey with our flexible membership options.
            Select the plan that aligns with your goals and start training today.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-7xl mx-auto px-6 relative">
        @foreach($plans as $plan)
            @php
                $isFeatured = $plan->name === 'Spartan Tier';
                $cardColor = $plan->card_color ?: 'bg-base-100';
            @endphp

            <div class="relative group h-full">
                @if($isFeatured)
                    <div
                        class="absolute -inset-1.5 bg-gradient-to-r from-primary to-secondary rounded-[2.5rem] blur opacity-25 group-hover:opacity-40 transition duration-500">
                    </div>
                    <div class="absolute top-0 right-10 transform -translate-y-1/2 z-20">
                        <span
                            class="bg-gradient-to-r from-primary to-secondary text-primary-content text-xs font-black uppercase tracking-widest px-4 py-2 rounded-full shadow-xl shadow-primary/20">
                            Most Popular
                        </span>
                    </div>
                @endif

                <div
                    class="relative h-full flex flex-col bg-base-100/80 backdrop-blur-xl p-10 rounded-[2rem] border border-base-content/5 shadow-2xl transition-all duration-500 group-hover:-translate-y-2 group-hover:shadow-primary/10">

                    <div class="mb-10 text-center">
                        <h2 class="text-xs font-black uppercase tracking-widest text-primary mb-4">{{ $plan->name }}</h2>
                        <div class="flex items-baseline justify-center gap-1">
                            <span class="text-2xl font-bold text-base-content/40">$</span>
                            <span
                                class="text-6xl font-display font-black text-base-content">{{ floor($plan->price) }}</span>
                            <span
                                class="text-xl font-bold text-base-content/40">.{{ substr(number_format($plan->price, 2), -2) }}</span>
                        </div>
                        <p class="mt-4 text-sm font-bold text-base-content/50 uppercase tracking-widest">
                            {{ $plan->duration_days }} Days Access
                        </p>
                    </div>

                    <div class="space-y-5 mb-12 flex-grow">
                        @php
                            $features = explode("\n", $plan->description);
                        @endphp
                        @foreach($features as $feature)
                            @if(trim($feature))
                                <div class="flex items-start gap-4 group/item">
                                    <div
                                        class="mt-1 w-5 h-5 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0 group-hover/item:bg-primary transition-colors">
                                        <svg class="w-3 h-3 text-primary group-hover/item:text-primary-content" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <span
                                        class="text-base-content/70 font-medium leading-tight group-hover/item:text-base-content transition-colors">
                                        {{ trim($feature) }}
                                    </span>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="mt-auto">
                        <button wire:click="subscribe({{ $plan->id }})"
                            wire:confirm="Are you sure you want to subscribe to {{ $plan->name }}?"
                            class="group/btn relative w-full h-14 rounded-2xl overflow-hidden transition-all active:scale-95">
                            <div
                                class="absolute inset-0 {{ $isFeatured ? 'bg-gradient-to-r from-primary to-secondary' : 'bg-base-content/5 hover:bg-base-content/10' }} transition-colors">
                            </div>
                            <div class="relative flex items-center justify-center gap-2 h-full">
                                <span
                                    class="font-display font-black uppercase tracking-widest text-sm {{ $isFeatured ? 'text-primary-content' : 'text-base-content' }}">
                                    Choose {{ explode(' ', $plan->name)[0] }}
                                </span>
                                <svg class="w-4 h-4 {{ $isFeatured ? 'text-primary-content' : 'text-base-content' }} group-hover/btn:translate-x-1 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Features Overview -->
    <div
        class="mt-32 max-w-5xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-12 border-t border-base-content/5 pt-20">
        <div class="text-center">
            <div
                class="w-16 h-16 bg-primary/10 rounded-[1.5rem] flex items-center justify-center mx-auto mb-6 text-primary">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
            </div>
            <h4 class="font-display font-bold text-lg mb-2">Secure Payments</h4>
            <p class="text-sm text-base-content/50">Your security is our priority. All transactions are encrypted.</p>
        </div>
        <div class="text-center">
            <div
                class="w-16 h-16 bg-secondary/10 rounded-[1.5rem] flex items-center justify-center mx-auto mb-6 text-secondary">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h4 class="font-display font-bold text-lg mb-2">24/7 Access</h4>
            <p class="text-sm text-base-content/50">Train on your own schedule with round-the-clock facility access.</p>
        </div>
        <div class="text-center">
            <div
                class="w-16 h-16 bg-accent/10 rounded-[1.5rem] flex items-center justify-center mx-auto mb-6 text-accent">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
            <h4 class="font-display font-bold text-lg mb-2">Expert Coaching</h4>
            <p class="text-sm text-base-content/50">Get personalized guidance from world-class trainers.</p>
        </div>
    </div>
</div>