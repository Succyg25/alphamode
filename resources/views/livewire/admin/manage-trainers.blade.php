@section('title', 'Trainer Ops')

<div class="space-y-12">
    <!-- Floating Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none -z-10">
        <div class="absolute top-40 right-10 w-80 h-80 bg-primary/5 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-40 left-10 w-80 h-80 bg-secondary/5 rounded-full blur-[120px]"></div>
    </div>

    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
        <div>
            <h2
                class="text-4xl font-display font-black bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent italic uppercase tracking-tighter">
                Trainers Directory
            </h2>
            <p class="text-xs font-black uppercase tracking-[0.3em] text-base-content/30 mt-2">Elite PERSONNEL
                Management</p>
        </div>
        <button wire:click="create"
            class="group relative h-14 px-8 rounded-2xl overflow-hidden shadow-xl transition-all active:scale-95">
            <div class="absolute inset-0 bg-gradient-to-r from-primary to-secondary"></div>
            <div class="relative flex items-center gap-3">
                <span class="font-display font-black uppercase tracking-widest text-sm text-primary-content">Add New
                    Operator</span>
                <svg class="w-5 h-5 text-primary-content" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </div>
        </button>
    </div>

    @if (session()->has('message'))
        <div
            class="alert alert-success bg-success/10 border border-success/20 text-success rounded-2xl p-6 backdrop-blur-md">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="font-bold uppercase tracking-widest text-xs">{{ session('message') }}</span>
        </div>
    @endif

    <div class="relative group">
        <div
            class="absolute -inset-1 bg-gradient-to-r from-primary/10 to-secondary/10 rounded-[2.5rem] blur-2xl opacity-50">
        </div>
        <div
            class="relative overflow-x-auto bg-base-100/40 backdrop-blur-2xl rounded-[2.5rem] border border-base-content/5 shadow-2xl">
            <table class="table w-full">
                <thead>
                    <tr class="border-b border-base-content/5">
                        <th
                            class="bg-transparent py-8 px-8 text-[10px] font-black uppercase tracking-[0.2em] text-base-content/40 italic">
                            Unit Identifier</th>
                        <th
                            class="bg-transparent py-8 px-8 text-[10px] font-black uppercase tracking-[0.2em] text-base-content/40 italic">
                            Intelligence Link</th>
                        <th
                            class="bg-transparent py-8 px-8 text-[10px] font-black uppercase tracking-[0.2em] text-base-content/40 italic">
                            Specializations</th>
                        <th
                            class="bg-transparent py-8 px-8 text-[10px] font-black uppercase tracking-[0.2em] text-base-content/40 italic text-right">
                            Directives</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-base-content/5">
                    @forelse($trainers as $trainer)
                        <tr class="group/row hover:bg-base-content/5 transition-colors">
                            <td class="py-6 px-8">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-12 h-12 rounded-xl overflow-hidden border-2 border-base-content/10 group-hover/row:border-primary/30 transition-colors">
                                        <img src="{{ $trainer->user->profile_photo_url }}"
                                            class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <p
                                            class="font-bold text-base-content group-hover/row:text-primary transition-colors">
                                            {{ $trainer->user->name ?? 'N/A' }}</p>
                                        <p
                                            class="text-[10px] font-black uppercase tracking-widest text-base-content/30 italic">
                                            Certified Operator</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-6 px-8">
                                <span
                                    class="text-sm font-medium text-base-content/60">{{ $trainer->user->email ?? 'N/A' }}</span>
                            </td>
                            <td class="py-6 px-8">
                                <div class="flex flex-wrap gap-2">
                                    @php $specs = explode(',', $trainer->specialties); @endphp
                                    @foreach($specs as $spec)
                                        <span
                                            class="inline-flex px-3 py-1 bg-primary/5 rounded-lg text-[10px] font-black uppercase tracking-widest text-primary/70">
                                            {{ trim($spec) }}
                                        </span>
                                    @endforeach
                                </div>
                            </td>
                            <td class="py-6 px-8">
                                <div class="flex justify-end gap-3">
                                    <button wire:click="edit({{ $trainer->id }})"
                                        class="btn btn-sm btn-circle btn-ghost text-primary hover:bg-primary/10">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <button wire:click="delete({{ $trainer->id }})"
                                        class="btn btn-sm btn-circle btn-ghost text-error hover:bg-error/10"
                                        onclick="confirm('Are you sure? This will delete the user account.') || event.stopImmediatePropagation()">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-20 text-center">
                                <p class="text-xs font-black uppercase tracking-[0.4em] text-base-content/20">Zero Operators
                                    Registered</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    @if($isModalOpen)
        <div class="modal modal-open backdrop-blur-md">
            <div
                class="modal-box bg-base-100/90 backdrop-blur-2xl rounded-[2.5rem] border border-base-content/10 p-10 max-w-2xl shadow-2xl">
                <div class="flex items-center gap-4 mb-10">
                    <div class="w-12 h-12 bg-primary/10 rounded-2xl flex items-center justify-center text-primary">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-display font-black uppercase tracking-tight italic">
                            {{ $trainer_id ? 'Refine Operator' : 'Register Operator' }}</h3>
                        <p class="text-[10px] font-black uppercase tracking-widest text-base-content/30">ID MODIFICATION
                            PROTOCOL</p>
                    </div>
                </div>

                <form wire:submit.prevent="store" class="space-y-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="form-control w-full">
                            <label class="label mb-2"><span
                                    class="label-text text-[10px] font-black uppercase tracking-widest text-base-content/40">Legal
                                    Designation</span></label>
                            <input type="text" wire:model="name"
                                class="input bg-base-content/5 border-none focus:ring-2 focus:ring-primary h-14 rounded-2xl font-bold" />
                            @error('name') <span
                            class="text-error text-[10px] font-black uppercase tracking-tighter mt-2">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-control w-full">
                            <label class="label mb-2"><span
                                    class="label-text text-[10px] font-black uppercase tracking-widest text-base-content/40">Communication
                                    Hash</span></label>
                            <input type="email" wire:model="email"
                                class="input bg-base-content/5 border-none focus:ring-2 focus:ring-primary h-14 rounded-2xl font-bold" />
                            @error('email') <span
                            class="text-error text-[10px] font-black uppercase tracking-tighter mt-2">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="form-control w-full">
                        <label class="label mb-2"><span
                                class="label-text text-[10px] font-black uppercase tracking-widest text-base-content/40">Secure
                                Access Key {{ $trainer_id ? '(Optional)' : '' }}</span></label>
                        <div class="relative w-full" x-data="{ show: false }">
                            <input :type="show ? 'text' : 'password'" wire:model="password"
                                class="input bg-base-content/5 border-none focus:ring-2 focus:ring-primary h-14 rounded-2xl font-bold pr-14 w-full" />
                            <button type="button" @click="show = !show"
                                class="absolute inset-y-0 right-4 flex items-center text-base-content/30 hover:text-primary transition-colors">
                                <svg x-show="!show" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg x-show="show" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    style="display: none;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.05 10.05 0 011.574-2.59M5.378 5.378A10.05 10.05 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.05 10.05 0 01-1.574 2.59M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                                </svg>
                            </button>
                        </div>
                        @error('password') <span
                        class="text-error text-[10px] font-black uppercase tracking-tighter mt-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-control w-full">
                        <label class="label mb-2"><span
                                class="label-text text-[10px] font-black uppercase tracking-widest text-base-content/40">Sector
                                Specializations</span></label>
                        <input type="text" wire:model="specialties"
                            class="input bg-base-content/5 border-none focus:ring-2 focus:ring-primary h-14 rounded-2xl font-bold"
                            placeholder="Yoga, CrossFit, Bio-hacking..." />
                        @error('specialties') <span
                        class="text-error text-[10px] font-black uppercase tracking-tighter mt-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-control w-full">
                        <label class="label mb-2"><span
                                class="label-text text-[10px] font-black uppercase tracking-widest text-base-content/40">Unit
                                Biography</span></label>
                        <textarea wire:model="bio"
                            class="textarea bg-base-content/5 border-none focus:ring-2 focus:ring-primary h-32 rounded-2xl font-medium p-4"></textarea>
                        @error('bio') <span
                        class="text-error text-[10px] font-black uppercase tracking-tighter mt-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="flex items-center justify-end gap-6 pt-6">
                        <button type="button" wire:click="closeModal"
                            class="text-xs font-black uppercase tracking-widest text-base-content/40 hover:text-base-content transition-colors">Abort</button>
                        <button type="submit"
                            class="group relative h-14 px-10 rounded-2xl overflow-hidden shadow-xl transition-all active:scale-95">
                            <div class="absolute inset-0 bg-gradient-to-r from-primary to-secondary"></div>
                            <span
                                class="relative font-display font-black uppercase tracking-widest text-sm text-primary-content">Synchronize
                                Unit</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>