<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Workout Classes</h2>
        <button wire:click="create" class="btn btn-primary">
            Add New Class
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
                    <th>Trainer</th>
                    <th>Capacity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($classes as $class)
                    <tr class="hover">
                        <td>{{ $class->name }}</td>
                        <td>{{ $class->trainer->user->name ?? 'N/A' }}</td>
                        <td>{{ $class->capacity }}</td>
                        <td class="gap-2 flex">
                            <button wire:click="edit({{ $class->id }})" class="btn btn-sm btn-ghost text-info">Edit</button>
                            <button wire:click="delete({{ $class->id }})" class="btn btn-sm btn-ghost text-error"
                                onclick="confirm('Are you sure?') || event.stopImmediatePropagation()">Delete</button>
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
                <h3 class="font-bold text-lg mb-4">{{ $class_id ? 'Edit Class' : 'Add New Class' }}</h3>
                <form wire:submit.prevent="store">
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text">Class Name</span>
                        </label>
                        <input type="text" wire:model="name" class="input input-bordered w-full" />
                        @error('name') <span class="text-error text-sm">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text">Trainer</span>
                        </label>
                        <select wire:model="trainer_id" class="select select-bordered w-full">
                            <option value="">Select Trainer</option>
                            @foreach($trainers as $trainer)
                                <option value="{{ $trainer->id }}">{{ $trainer->user->name }}</option>
                            @endforeach
                        </select>
                        @error('trainer_id') <span class="text-error text-sm">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text">Capacity</span>
                        </label>
                        <input type="number" wire:model="capacity" class="input input-bordered w-full" />
                        @error('capacity') <span class="text-error text-sm">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text">Description</span>
                        </label>
                        <textarea wire:model="description" class="textarea textarea-bordered h-24"></textarea>
                        @error('description') <span class="text-error text-sm">{{ $message }}</span>@enderror
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