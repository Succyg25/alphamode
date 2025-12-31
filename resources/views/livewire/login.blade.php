<div class="flex flex-col gap-10">
    <div class="flex flex-col gap-2">
        <h2 class="text-2xl font-bold text-primary">Login</h2>

        <form wire:submit.prevent="loginUser" class="space-y-4">
            {{-- Flash Message --}}
            @if (session()->has('feedback') || request()->has('feedback'))
                <div role="alert" class="alert alert-primary alert-soft">
                    <span>{{ session('feedback') ?? request('feedback') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Email Address</legend>
                    <input type="email" wire:model="email" class="input input-lg rounded-2xl w-full"
                        placeholder="Type here" />
                    @error('email')<p class="label text-primary">{{ $message }}</p>@enderror
                </fieldset>

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Password</legend>
                    <div class="relative w-full" x-data="{ show: false }">
                        <input :type="show ? 'text' : 'password'" wire:model="password"
                            class="input input-lg rounded-2xl w-full pr-10" placeholder="********" />
                        <button type="button" @click="show = !show"
                            class="absolute inset-y-0 right-0 pr-5 flex items-center text-sm leading-5">
                            <svg x-show="!show" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg x-show="show" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" style="display: none;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.05 10.05 0 011.574-2.59M5.378 5.378A10.05 10.05 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.05 10.05 0 01-1.574 2.59M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                            </svg>
                        </button>
                    </div>
                    @error('password')<p class="label text-primary">{{ $message }}</p>@enderror
                </fieldset>
            </div>

            <button class="btn btn-primary">Validate Credentials</button>
        </form>
    </div>
</div>