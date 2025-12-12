<div class="max-w-4xl mx-auto py-12">
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-bold">Book a Class with {{ $trainer->user->name }}</h1>
        <p class="text-gray-600">Select a suitable time for your workout.</p>
    </div>

    @if($step === 1)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($schedules as $schedule)
                <div class="card bg-base-100 shadow-xl border border-base-200">
                    <div class="card-body">
                        <h2 class="card-title text-primary">{{ $schedule->workoutClass->name }}</h2>
                        <p class="font-bold">{{ $schedule->start_time->format('l, M d') }}</p>
                        <p>{{ $schedule->start_time->format('h:i A') }} - {{ $schedule->end_time->format('h:i A') }}</p>
                        <p class="text-sm">Capacity: {{ $schedule->workoutClass->capacity }}</p>
                        <div class="card-actions justify-end mt-4">
                            <button wire:click="selectSchedule({{ $schedule->id }})"
                                class="btn btn-primary btn-sm">Select</button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-10">
                    <p class="text-lg">No upcoming classes available for this trainer.</p>
                    <a href="{{ route('trainers') }}" class="btn btn-ghost mt-4">Go Back</a>
                </div>
            @endforelse
        </div>
    @elseif($step === 2)
        <div class="card bg-base-100 shadow-xl max-w-lg mx-auto">
            <div class="card-body">
                <h2 class="card-title mb-6">Confirm Booking</h2>
                <div class="space-y-4 mb-6">
                    <div class="flex justify-between">
                        <span class="font-bold">Class:</span>
                        <span>{{ $selectedSchedule->workoutClass->name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-bold">Trainer:</span>
                        <span>{{ $trainer->user->name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-bold">Date:</span>
                        <span>{{ $selectedSchedule->start_time->format('l, M d, Y') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-bold">Time:</span>
                        <span>{{ $selectedSchedule->start_time->format('h:i A') }} -
                            {{ $selectedSchedule->end_time->format('h:i A') }}</span>
                    </div>
                </div>

                <div class="alert alert-info">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="stroke-current shrink-0 w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Please arrive 15 minutes early.</span>
                </div>

                <div class="card-actions justify-end mt-6 gap-2">
                    <button wire:click="$set('step', 1)" class="btn btn-ghost">Cancel</button>
                    <button wire:click="confirmBooking" class="btn btn-primary">Confirm Booking</button>
                </div>
            </div>
        </div>
    @endif
</div>