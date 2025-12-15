<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Trainers Directory</h2>
        <button wire:click="create" class="btn btn-primary">
            Add New Trainer
        </button>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success mb-4" role="alert">
            <span>{{ session('message') }}</span>
        </div>
    @endif

    <div class="overflow-x-auto bg-base-100 shadow-xl rounded-lg">
        <table class="table w-full">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Specialties</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trainers as $trainer)
                    <tr class="hover">
                        <td>{{ $trainer->user->name ?? 'N/A' }}</td>
                        <td>{{ $trainer->user->email ?? 'N/A' }}</td>
                        <td>{{ $trainer->specialties }}</td>
                        <td class="gap-2 flex">
                            <button wire:click="edit({{ $trainer->id }})"
                                class="btn btn-sm btn-ghost text-info">Edit</button>
                            <button wire:click="delete({{ $trainer->id }})" class="btn btn-sm btn-ghost text-error"
                                onclick="confirm('Are you sure? This will delete the user account.') || event.stopImmediatePropagation()">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    @if($isModalOpen)
        <div class="modal modal-open">
            <div class="modal-box">
                <h3 class="font-bold text-lg mb-4">{{ $trainer_id ? 'Edit Trainer' : 'Add New Trainer' }}</h3>
                <form wire:submit.prevent="store">
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text">Name</span>
                        </label>
                        <input type="text" wire:model="name" class="input input-bordered w-full" />
                        @error('name') <span class="text-error text-sm">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="email" wire:model="email" class="input input-bordered w-full" />
                        @error('email') <span class="text-error text-sm">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text">Specialties</span>
                        </label>
                        <input type="text" wire:model="specialties" class="input input-bordered w-full"
                            placeholder="Yoga, CrossFit, etc." />
                        @error('specialties') <span class="text-error text-sm">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text">Bio</span>
                        </label>
                        <textarea wire:model="bio" class="textarea textarea-bordered h-24"></textarea>
                        @error('bio') <span class="text-error text-sm">{{ $message }}</span>@enderror
                    </div>

                    <div class="modal-action">
                        <button type="button" wire:click="closeModal" class="btn btn-ghost">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>