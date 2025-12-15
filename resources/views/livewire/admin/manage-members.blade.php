<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Members Directory</h2>
        <button wire:click="create" class="btn btn-primary">
            Add New Member
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
                    <th>Joined Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                    <tr class="hover">
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->created_at->format('M d, Y') }}</td>
                        <td class="gap-2 flex">
                            <button wire:click="edit({{ $member->id }})"
                                class="btn btn-sm btn-ghost text-info">Edit</button>
                            <button wire:click="delete({{ $member->id }})" class="btn btn-sm btn-ghost text-error"
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
                <h3 class="font-bold text-lg mb-4">{{ $member_id ? 'Edit Member' : 'Add New Member' }}</h3>
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
                            <span class="label-text">Password {{ $member_id ? '(Leave blank to keep current)' : '' }}</span>
                        </label>
                        <input type="password" wire:model="password" class="input input-bordered w-full" />
                        @error('password') <span class="text-error text-sm">{{ $message }}</span>@enderror
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