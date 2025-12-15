<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Membership Plans</h2>
        <button wire:click="create" class="btn btn-primary">
            Add New Plan
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
                    <th>Price</th>
                    <th>Duration (Days)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($plans as $plan)
                    <tr class="hover">
                        <td>{{ $plan->name }}</td>
                        <td>${{ $plan->price }}</td>
                        <td>{{ $plan->duration_days }}</td>
                        <td class="gap-2 flex">
                            <button wire:click="edit({{ $plan->id }})" class="btn btn-sm btn-ghost text-info">Edit</button>
                            <button wire:click="delete({{ $plan->id }})" class="btn btn-sm btn-ghost text-error"
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
                <h3 class="font-bold text-lg mb-4">{{ $plan_id ? 'Edit Plan' : 'Add New Plan' }}</h3>
                <form wire:submit.prevent="store">
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text">Plan Name</span>
                        </label>
                        <input type="text" wire:model="name" class="input input-bordered w-full" />
                        @error('name') <span class="text-error text-sm">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text">Price</span>
                        </label>
                        <input type="text" wire:model="price" class="input input-bordered w-full" />
                        @error('price') <span class="text-error text-sm">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text">Duration (Days)</span>
                        </label>
                        <input type="number" wire:model="duration_days" class="input input-bordered w-full" />
                        @error('duration_days') <span class="text-error text-sm">{{ $message }}</span>@enderror
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