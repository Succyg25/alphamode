@section('title', 'Class Protocol')

<div class="space-y-12">
    <!-- Floating Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none -z-10">
        <div class="absolute top-20 left-20 w-96 h-96 bg-accent/5 rounded-full blur-[130px]"></div>
        <div class="absolute bottom-20 right-20 w-96 h-96 bg-primary/5 rounded-full blur-[130px]"></div>
    </div>

    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
        <div>
            <h2
                class="text-4xl font-display font-black bg-gradient-to-r from-accent to-primary bg-clip-text text-transparent italic uppercase tracking-tighter">
                Workout Classes
            </h2>
            <p class="text-xs font-black uppercase tracking-[0.3em] text-base-content/30 mt-2">Operational PROTOCOL
                Management</p>
        </div>
        <button wire:click="create"
            class="group relative h-14 px-8 rounded-2xl overflow-hidden shadow-xl transition-all active:scale-95">
            <div class="absolute inset-0 bg-gradient-to-r from-accent to-primary"></div>
            <div class="relative flex items-center gap-3">
                <span class="font-display font-black uppercase tracking-widest text-sm text-primary-content">Add New
                    Protocol</span>
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
            class="absolute -inset-1 bg-gradient-to-r from-accent/10 to-primary/10 rounded-[2.5rem] blur-2xl opacity-50">
        </div>
        <div
            class="relative overflow-x-auto bg-base-100/40 backdrop-blur-2xl rounded-[2.5rem] border border-base-content/5 shadow-2xl">
            <table class="table w-full">
                <thead>
                    <tr class="border-b border-base-content/5">
                        <th
                            class="bg-transparent py-8 px-8 text-[10px] font-black uppercase tracking-[0.2em] text-base-content/40 italic">
                            Protocol Identifier</th>
                        <th
                            class="bg-transparent py-8 px-8 text-[10px] font-black uppercase tracking-[0.2em] text-base-content/40 italic">
                            Assigned Operator</th>
                        <th
                            class="bg-transparent py-8 px-8 text-[10px] font-black uppercase tracking-[0.2em] text-base-content/40 italic">
                            Unit Capacity</th>
                        <th
                            class="bg-transparent py-8 px-8 text-[10px] font-black uppercase tracking-[0.2em] text-base-content/40 italic text-right">
                            Directives</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-base-content/5">
                    @forelse($classes as $class)
                        <tr class="group/row hover:bg-base-content/5 transition-colors">
                            <td class="py-6 px-8">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-12 h-12 rounded-xl bg-accent/10 flex items-center justify-center text-accent group-hover/row:scale-110 transition-transform">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p
                                            class="font-bold text-base-content group-hover/row:text-accent transition-colors">
                                            {{ $class->name }}</p>
                                        <p
                                            class="text-[10px] font-black uppercase tracking-widest text-base-content/30 italic">
                                            High Intensity Protocol</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-6 px-8">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg overflow-hidden border border-base-content/10">
                                        <img src="{{ $class->trainer->user->profile_photo_url }}"
                                            class="w-full h-full object-cover">
                                    </div>
                                    <span
                                        class="text-sm font-medium text-base-content/60">{{ $class->trainer->user->name ?? 'N/A' }}</span>
                                </div>
                            </td>
                            <td class="py-6 px-8">
                                <div class="flex items-center gap-2">
                                    <span
                                        class="text-lg font-display font-black text-base-content">{{ $class->capacity }}</span>
                                    <span
                                        class="text-[10px] font-black uppercase tracking-widest text-base-content/30 italic">Slots</span>
                                </div>
                            </td>
                            <td class="py-6 px-8">
                                <div class="flex justify-end gap-3">
                                    <button wire:click="edit({{ $class->id }})"
                                        class="btn btn-sm btn-circle btn-ghost text-accent hover:bg-accent/10">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <button wire:click="delete({{ $class->id }})"
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
                                <p class="text-xs font-black uppercase tracking-[0.4em] text-base-content/20">Zero Protocols
                                    Defined</p>
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
                    <div class="w-12 h-12 bg-accent/10 rounded-2xl flex items-center justify-center text-accent">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-display font-black uppercase tracking-tight italic">
                            {{ $class_id ? 'Refine Protocol' : 'Define Protocol' }}</h3>
                        <p class="text-[10px] font-black uppercase tracking-widest text-base-content/30">OPERATIONAL
                            PARAMETERS</p>
                    </div>
                </div>

                <form wire:submit.prevent="store" class="space-y-8">
                    <div class="form-control w-full">
                        <label class="label mb-2"><span
                                class="label-text text-[10px] font-black uppercase tracking-widest text-base-content/40">Protocol
                                Nomenclature</span></label>
                        <input type="text" wire:model="name"
                            class="input bg-base-content/5 border-none focus:ring-2 focus:ring-accent h-14 rounded-2xl font-bold" />
                        @error('name') <span
                        class="text-error text-[10px] font-black uppercase tracking-tighter mt-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="form-control w-full">
                            <label class="label mb-2"><span
                                    class="label-text text-[10px] font-black uppercase tracking-widest text-base-content/40">Assigned
                                    Operator</span></label>
                            <select wire:model="trainer_id"
                                class="select bg-base-content/5 border-none focus:ring-2 focus:ring-accent h-14 rounded-2xl font-bold">
                                <option value="">Select Operator</option>
                                @foreach($trainers as $trainer)
                                    <option value="{{ $trainer->id }}">{{ $trainer->user->name }}</option>
                                @endforeach
                            </select>
                            @error('trainer_id') <span
                            class="text-error text-[10px] font-black uppercase tracking-tighter mt-2">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-control w-full">
                            <label class="label mb-2"><span
                                    class="label-text text-[10px] font-black uppercase tracking-widest text-base-content/40">Unit
                                    Capacity</span></label>
                            <input type="number" wire:model="capacity"
                                class="input bg-base-content/5 border-none focus:ring-2 focus:ring-accent h-14 rounded-2xl font-bold" />
                            @error('capacity') <span
                            class="text-error text-[10px] font-black uppercase tracking-tighter mt-2">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="form-control w-full">
                        <label class="label mb-2"><span
                                class="label-text text-[10px] font-black uppercase tracking-widest text-base-content/40">Protocol
                                Briefing</span></label>
                        <textarea wire:model="description"
                            class="textarea bg-base-content/5 border-none focus:ring-2 focus:ring-accent h-32 rounded-2xl font-medium p-4"></textarea>
                        @error('description') <span
                        class="text-error text-[10px] font-black uppercase tracking-tighter mt-2">{{ $message }}</span>@enderror
                    </div>

                    <div class="flex items-center justify-end gap-6 pt-6">
                        <button type="button" wire:click="closeModal"
                            class="text-xs font-black uppercase tracking-widest text-base-content/40 hover:text-base-content transition-colors">Abort</button>
                        <button type="submit"
                            class="group relative h-14 px-10 rounded-2xl overflow-hidden shadow-xl transition-all active:scale-95">
                            <div class="absolute inset-0 bg-gradient-to-r from-accent to-primary"></div>
                            <span
                                class="relative font-display font-black uppercase tracking-widest text-sm text-primary-content">Synchronize
                                Protocol</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>