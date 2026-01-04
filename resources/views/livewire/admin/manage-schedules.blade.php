@section('title', 'Temporal Ops')

<div class="space-y-12">
    <!-- Floating Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none -z-10">
        <div class="absolute top-1/4 right-1/4 w-72 h-72 bg-secondary/10 rounded-full blur-[110px] animate-pulse"></div>
        <div class="absolute bottom-1/4 left-1/4 w-72 h-72 bg-primary/10 rounded-full blur-[110px] animate-pulse"
            style="animation-delay: 2s;"></div>
    </div>

    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
        <div>
            <h2
                class="text-4xl font-display font-black bg-gradient-to-r from-secondary to-primary bg-clip-text text-transparent italic uppercase tracking-tighter">
                Class Schedules
            </h2>
            <p class="text-xs font-black uppercase tracking-[0.3em] text-base-content/30 mt-2">Temporal SYNC Management
            </p>
        </div>
        <button wire:click="create"
            class="group relative h-14 px-8 rounded-2xl overflow-hidden shadow-xl transition-all active:scale-95">
            <div class="absolute inset-0 bg-gradient-to-r from-secondary to-primary"></div>
            <div class="relative flex items-center gap-3">
                <span class="font-display font-black uppercase tracking-widest text-sm text-primary-content">Initialize
                    Window</span>
                <svg class="w-5 h-5 text-primary-content" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
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
            class="absolute -inset-1 bg-gradient-to-r from-secondary/10 to-primary/10 rounded-[2.5rem] blur-2xl opacity-50">
        </div>
        <div
            class="relative overflow-x-auto bg-base-100/40 backdrop-blur-2xl rounded-[2.5rem] border border-base-content/5 shadow-2xl">
            <table class="table w-full">
                <thead>
                    <tr class="border-b border-base-content/5">
                        <th
                            class="bg-transparent py-8 px-8 text-[10px] font-black uppercase tracking-[0.2em] text-base-content/40 italic">
                            Active Protocol</th>
                        <th
                            class="bg-transparent py-8 px-8 text-[10px] font-black uppercase tracking-[0.2em] text-base-content/40 italic">
                            Temporal Offset</th>
                        <th
                            class="bg-transparent py-8 px-8 text-[10px] font-black uppercase tracking-[0.2em] text-base-content/40 italic">
                            Cycle Duration</th>
                        <th
                            class="bg-transparent py-8 px-8 text-[10px] font-black uppercase tracking-[0.2em] text-base-content/40 italic text-right">
                            Directives</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-base-content/5">
                    @forelse($schedules as $schedule)
                        <tr class="group/row hover:bg-base-content/5 transition-colors">
                            <td class="py-6 px-8">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-12 h-12 rounded-xl bg-secondary/10 flex items-center justify-center text-secondary group-hover/row:rotate-6 transition-transform">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p
                                            class="font-bold text-base-content group-hover/row:text-secondary transition-colors">
                                            {{ $schedule->workoutClass->name ?? 'N/A' }}</p>
                                        <p
                                            class="text-[10px] font-black uppercase tracking-widest text-base-content/30 italic">
                                            High-Fidelity Sync</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-6 px-8">
                                <div class="flex flex-col">
                                    <span
                                        class="text-sm font-bold text-base-content">{{ $schedule->start_time->format('M d, Y') }}</span>
                                    <span
                                        class="text-xs font-black text-secondary/70 uppercase tracking-tighter">{{ $schedule->start_time->format('H:i') }}
                                        HRS</span>
                                </div>
                            </td>
                            <td class="py-6 px-8">
                                <div class="flex items-center gap-2 px-3 py-1.5 bg-base-content/5 rounded-xl w-fit">
                                    <svg class="w-3 h-3 text-secondary" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M12 8v4l3 3" />
                                    </svg>
                                    <span class="text-[10px] font-black uppercase tracking-widest text-base-content/60">
                                        {{ $schedule->start_time->format('H:i') }} -
                                        {{ $schedule->end_time->format('H:i') }}
                                    </span>
                                </div>
                            </td>
                            <td class="py-6 px-8">
                                <div class="flex justify-end gap-3">
                                    <button wire:click="edit({{ $schedule->id }})"
                                        class="btn btn-sm btn-circle btn-ghost text-secondary hover:bg-secondary/10">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <button wire:click="delete({{ $schedule->id }})"
                                        class="btn btn-sm btn-circle btn-ghost text-error hover:bg-error/10"
                                        onclick="confirm('Are you sure?') || event.stopImmediatePropagation()">
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
                                <p class="text-xs font-black uppercase tracking-[0.4em] text-base-content/20">Zero Temporal
                                    Windows Initialized</p>
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
                    <div class="w-12 h-12 bg-secondary/10 rounded-2xl flex items-center justify-center text-secondary">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-display font-black uppercase tracking-tight italic">
                            {{ $schedule_id ? 'Refine Window' : 'Initialize Window' }}</h3>
                        <p class="text-[10px] font-black uppercase tracking-widest text-base-content/30">TEMPORAL PARAMETERS
                        </p>
                    </div>
                </div>

                <form wire:submit.prevent="store" class="space-y-8">
                    <div class="form-control w-full">
                        <label class="label mb-2"><span
                                class="label-text text-[10px] font-black uppercase tracking-widest text-base-content/40">Active
                                Protocol Target</span></label>
                        <select wire:model="workout_class_id"
                            class="select bg-base-content/5 border-none focus:ring-2 focus:ring-secondary h-14 rounded-2xl font-bold">
                            <option value="">Select Target Protocol</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                        @error('workout_class_id') <span
                        class="text-error text-[10px] font-black uppercase tracking-tighter mt-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="form-control w-full">
                            <label class="label mb-2"><span
                                    class="label-text text-[10px] font-black uppercase tracking-widest text-base-content/40">Sync
                                    Initiation (Start)</span></label>
                            <input type="datetime-local" wire:model="start_time"
                                class="input bg-base-content/5 border-none focus:ring-2 focus:ring-secondary h-14 rounded-2xl font-bold" />
                            @error('start_time') <span
                            class="text-error text-[10px] font-black uppercase tracking-tighter mt-2">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-control w-full">
                            <label class="label mb-2"><span
                                    class="label-text text-[10px] font-black uppercase tracking-widest text-base-content/40">Sync
                                    Termination (End)</span></label>
                            <input type="datetime-local" wire:model="end_time"
                                class="input bg-base-content/5 border-none focus:ring-2 focus:ring-secondary h-14 rounded-2xl font-bold" />
                            @error('end_time') <span
                            class="text-error text-[10px] font-black uppercase tracking-tighter mt-2">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-6 pt-6">
                        <button type="button" wire:click="closeModal"
                            class="text-xs font-black uppercase tracking-widest text-base-content/40 hover:text-base-content transition-colors">Abort</button>
                        <button type="submit"
                            class="group relative h-14 px-10 rounded-2xl overflow-hidden shadow-xl transition-all active:scale-95">
                            <div class="absolute inset-0 bg-gradient-to-r from-secondary to-primary"></div>
                            <span
                                class="relative font-display font-black uppercase tracking-widest text-sm text-primary-content">Synchronize
                                Window</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>