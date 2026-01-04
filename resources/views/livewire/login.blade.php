<div class="min-h-[80vh] flex items-center justify-center relative overflow-hidden py-20">
    <!-- Cosmic Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none -z-10">
        <div
            class="absolute top-1/4 -left-20 w-[500px] h-[500px] bg-primary/20 rounded-full blur-[120px] animate-pulse">
        </div>
        <div class="absolute bottom-1/4 -right-20 w-[500px] h-[500px] bg-secondary/20 rounded-full blur-[120px] animate-pulse"
            style="animation-delay: 2s;"></div>

        <!-- Large Decorative Text -->
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-[15rem] font-display font-black text-base-content/[0.02] uppercase tracking-[0.2em] select-none whitespace-nowrap italic -rotate-12">
            Authenticate
        </div>
    </div>

    <div class="w-full max-w-xl px-6 relative">
        <!-- Auth Card -->
        <div class="relative group">
            <div
                class="absolute -inset-1 bg-gradient-to-tr from-primary/20 via-secondary/20 to-accent/20 rounded-[3rem] blur-2xl opacity-50 group-hover:opacity-100 transition-opacity duration-700">
            </div>

            <div
                class="relative bg-base-100/40 backdrop-blur-3xl p-10 md:p-14 rounded-[3rem] border border-base-content/5 shadow-2xl overflow-hidden">
                <!-- Branding Header -->
                <div class="text-center mb-12">
                    <div
                        class="inline-block px-4 py-1.5 mb-6 text-[10px] font-black tracking-[0.4em] text-primary uppercase bg-primary/10 rounded-full italic">
                        Gateway Access
                    </div>
                    <h2
                        class="text-5xl font-display font-black bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent italic uppercase tracking-tighter mb-4">
                        Login
                    </h2>
                    <p class="text-xs font-black uppercase tracking-[0.2em] text-base-content/40 leading-relaxed">
                        Secure entry into the AlphaMode <br> Operational Ecosystem
                    </p>
                </div>

                <form wire:submit.prevent="loginUser" class="space-y-8">
                    {{-- Flash Message --}}
                    @if (session()->has('feedback') || request()->has('feedback'))
                        <div role="alert"
                            class="alert alert-success bg-success/10 border border-success/20 text-success rounded-2xl p-6 backdrop-blur-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span
                                class="font-bold uppercase tracking-widest text-xs">{{ session('feedback') ?? request('feedback') }}</span>
                        </div>
                    @endif

                    <div class="space-y-6">
                        <!-- Email -->
                        <div class="form-control w-full group/field">
                            <label class="label mb-2">
                                <span
                                    class="label-text text-[10px] font-black uppercase tracking-[0.2em] text-base-content/40 group-focus-within/field:text-primary transition-colors italic">Comm-Link
                                    Hash (Email)</span>
                            </label>
                            <div class="relative">
                                <input type="email" wire:model="email"
                                    class="input bg-base-content/5 border-none focus:ring-2 focus:ring-primary h-16 rounded-2xl font-bold w-full pl-6 group-focus-within/field:bg-base-content/10 transition-all text-lg"
                                    placeholder="Enter your email..." />
                            </div>
                            @error('email')<p class="text-error text-[10px] font-black uppercase tracking-tighter mt-2">
                                {{ $message }}
                            </p>@enderror
                        </div>

                        <!-- Password -->
                        <div class="form-control w-full group/field">
                            <label class="label mb-2">
                                <span
                                    class="label-text text-[10px] font-black uppercase tracking-[0.2em] text-base-content/40 group-focus-within/field:text-secondary transition-colors italic">Access
                                    Key (Password)</span>
                            </label>
                            <div class="relative" x-data="{ show: false }">
                                <input :type="show ? 'text' : 'password'" wire:model="password"
                                    class="input bg-base-content/5 border-none focus:ring-2 focus:ring-secondary h-16 rounded-2xl font-bold w-full pl-6 pr-14 group-focus-within/field:bg-base-content/10 transition-all text-lg"
                                    placeholder="********" />
                                <button type="button" @click="show = !show"
                                    class="absolute inset-y-0 right-4 flex items-center text-base-content/30 hover:text-secondary transition-colors p-2">
                                    <svg x-show="!show" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    <svg x-show="show" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" style="display: none;">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.05 10.05 0 011.574-2.59M5.378 5.378A10.05 10.05 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.05 10.05 0 01-1.574 2.59M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 3l18 18" />
                                    </svg>
                                </button>
                            </div>
                            @error('password')<p
                                class="text-error text-[10px] font-black uppercase tracking-tighter mt-2">{{ $message }}
                            </p>@enderror
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit"
                            class="group/btn relative w-full h-16 rounded-[2rem] overflow-hidden shadow-2xl transition-all active:scale-[0.98]">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-primary via-secondary to-accent group-hover/btn:scale-110 transition-transform duration-500">
                            </div>
                            <div class="relative flex items-center justify-center gap-4">
                                <span
                                    class="font-display font-black uppercase tracking-[0.3em] text-sm text-primary-content">Validate
                                    Credentials</span>
                                <svg class="w-6 h-6 text-primary-content group-hover/btn:translate-x-1 transition-transform"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </div>
                        </button>
                    </div>

                    <div class="text-center pt-6">
                        <p class="text-[10px] font-black uppercase tracking-widest text-base-content/30 italic mb-4">
                            Zero records found?</p>
                        <a href="{{ route('register') }}"
                            class="text-xs font-bold text-primary hover:text-secondary uppercase tracking-widest transition-colors flex items-center justify-center gap-2">
                            <span>Initialize Registration</span>
                            <span class="w-1.5 h-1.5 rounded-full bg-primary/40"></span>
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Decorative Floating Node -->
        <div class="absolute -bottom-10 -right-10 w-24 h-24 bg-primary/20 rounded-3xl blur-2xl animate-bounce pointer-events-none"
            style="animation-duration: 4s;"></div>
    </div>
</div>