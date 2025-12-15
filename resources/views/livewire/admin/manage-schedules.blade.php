<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Class Schedules</h2>
        <button wire:click="create" class="btn btn-primary">
            Add New Schedule
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
                    <th>Class</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($schedules as $schedule)
                    <tr class="hover">
                        <td>{{ $schedule->workoutClass->name ?? 'N/A' }}</td>
                        <td>{{ $schedule->start_time->format('M d, Y H:i') }}</td>
                        <td>{{ $schedule->end_time->format('H:i') }}</td>
                        <td class="gap-2 flex">
                            <button wire:click="edit({{ $schedule->id }})"
                                class="btn btn-sm btn-ghost text-info">Edit</button>
                            <button wire:click="delete({{ $schedule->id }})" class="btn btn-sm btn-ghost text-error"
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
                <h3 class="font-bold text-lg mb-4">{{ $schedule_id ? 'Edit Schedule' : 'Add New Schedule' }}</h3>
                <form wire:submit.prevent="store">
                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text">Class</span>
                        </label>
                        <select wire:model="workout_class_id" class="select select-bordered w-full">
                            <option value="">Select Class</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                        @error('workout_class_id') <span class="text-error text-sm">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text">Start Time</span>
                        </label>
                        <input type="datetime-local" wire:model="start_time" class="input input-bordered w-full" />
                        @error('start_time') <span class="text-error text-sm">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-control w-full mb-4">
                        <label class="label">
                            <span class="label-text">End Time</span>
                        </label>
                        <input type="datetime-local" wire:model="end_time" class="input input-bordered w-full" />
                        @error('end_time') <span class="text-error text-sm">{{ $message }}</span>@enderror
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