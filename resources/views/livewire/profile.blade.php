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
            Member Settings
        </div>
        <h1
            class="text-5xl font-display font-black mb-6 bg-gradient-to-r from-primary via-secondary to-accent bg-clip-text text-transparent italic">
            Update Profile
        </h1>
        <p class="text-xl text-base-content/60 max-w-2xl mx-auto leading-relaxed">
            Personalize your experience in the AlphaMode community. Your profile
            updates reflect your progress.
        </p>
    </div>

    <div class="max-w-4xl mx-auto px-6">
        @if (session()->has('success'))
            <div
                class="alert alert-success mb-10 bg-success/10 border border-success/20 text-success rounded-2xl p-6 backdrop-blur-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="font-bold">{{ session('success') }}</span>
            </div>
        @endif

        <div class="relative group">
            <div
                class="absolute -inset-1.5 bg-gradient-to-tr from-primary/20 via-secondary/20 to-accent/20 rounded-[2.5rem] blur opacity-30">
            </div>
            <div class="relative bg-base-100 p-10 md:p-14 rounded-[2.5rem] border border-base-content/5 shadow-2xl">

                <form wire:submit.prevent="updateProfile">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

                        <!-- Profile Photo Column -->
                        <div class="lg:col-span-4 flex flex-col items-center">
                            <div class="relative group/photo mb-8">
                                <div
                                    class="w-48 h-48 rounded-[3rem] bg-gradient-to-tr from-primary to-secondary p-1 overflow-hidden shadow-2xl group-hover/photo:rotate-3 transition-transform duration-500">
                                    <div
                                        class="w-full h-full rounded-[2.8rem] bg-base-100 flex items-center justify-center overflow-hidden relative">
                                        @if ($photo)
                                            <img src="{{ $photo->temporaryUrl() }}" class="w-full h-full object-cover">
                                        @else
                                            <img src="{{ $currentPhoto }}" class="w-full h-full object-cover">
                                        @endif

                                        <div wire:loading wire:target="photo"
                                            class="absolute inset-0 bg-base-100/80 backdrop-blur-sm flex items-center justify-center">
                                            <span class="loading loading-spinner loading-lg text-primary"></span>
                                        </div>
                                    </div>
                                </div>

                                <label
                                    class="absolute -bottom-4 left-1/2 -translate-x-1/2 btn btn-primary btn-circle shadow-xl shadow-primary/20 border-4 border-base-100 cursor-pointer hover:scale-110 active:scale-95 transition-all">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <input type="file" wire:model="photo" class="hidden" accept="image/*" />
                                </label>
                            </div>
                            <p class="text-xs font-bold uppercase tracking-wider text-base-content/40 text-center">
                                PNG, JPG or WEBP <br> Max 1MB
                            </p>
                            @error('photo')
                                <p class="text-[10px] text-error font-bold mt-2 uppercase tracking-tighter">{{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Info Column -->
                        <div class="lg:col-span-8 space-y-8">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Name -->
                                <div class="form-control w-full">
                                    <label class="label mb-2">
                                        <span
                                            class="label-text text-xs font-bold uppercase tracking-wider text-base-content/40">Full
                                            Name</span>
                                    </label>
                                    <input type="text" wire:model="name"
                                        class="input bg-base-content/5 border-none focus:ring-2 focus:ring-primary h-14 rounded-2xl font-bold @error('name') ring-2 ring-error @enderror" />
                                    @error('name')
                                        <label class="label"><span
                                                class="label-text-alt text-error font-bold">{{ $message }}</span></label>
                                    @enderror
                                </div>

                                <!-- Username -->
                                <div class="form-control w-full">
                                    <label class="label mb-2">
                                        <span
                                            class="label-text text-xs font-bold uppercase tracking-wider text-base-content/40">Username</span>
                                    </label>
                                    <div class="relative">
                                        <span
                                            class="absolute left-4 top-1/2 -translate-y-1/2 font-bold text-primary">@</span>
                                        <input type="text" wire:model="username"
                                            class="input bg-base-content/5 border-none focus:ring-2 focus:ring-primary h-14 rounded-2xl font-bold pl-10 w-full @error('username') ring-2 ring-error @enderror" />
                                    </div>
                                    @error('username')
                                        <label class="label"><span
                                                class="label-text-alt text-error font-bold">{{ $message }}</span></label>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="form-control w-full">
                                <label class="label mb-2">
                                    <span
                                        class="label-text text-xs font-bold uppercase tracking-wider text-base-content/40">Email
                                        Address</span>
                                </label>
                                <input type="email" wire:model="email"
                                    class="input bg-base-content/5 border-none focus:ring-2 focus:ring-primary h-14 rounded-2xl font-bold @error('email') ring-2 ring-error @enderror" />
                                @error('email')
                                    <label class="label"><span
                                            class="label-text-alt text-error font-bold">{{ $message }}</span></label>
                                @enderror
                            </div>

                            <div class="pt-6 border-t border-base-content/5 flex items-center justify-between gap-6">
                                <div class="hidden sm:block">
                                    <p
                                        class="text-[10px] font-bold uppercase tracking-wider text-base-content/30 italic">
                                        AlphaMode Security: Personal data is <br> encrypted for your protection.
                                    </p>
                                </div>
                                <button type="submit"
                                    class="group/btn relative h-14 px-12 rounded-2xl overflow-hidden shadow-xl transition-all active:scale-95 flex-shrink-0">
                                    <div class="absolute inset-0 bg-gradient-to-r from-primary to-secondary"></div>
                                    <div class="relative flex items-center gap-3">
                                        <span
                                            class="font-display font-bold uppercase tracking-wider text-sm text-primary-content">
                                            Save Changes
                                        </span>
                                        <svg wire:loading.remove wire:target="updateProfile"
                                            class="w-5 h-5 text-primary-content group-hover/btn:translate-x-1 transition-transform"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                        <span wire:loading wire:target="updateProfile"
                                            class="loading loading-spinner loading-sm text-primary-content"></span>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>