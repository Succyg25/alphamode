<div>
    <h1 class="text-3xl font-bold mb-8">Trainer Dashboard</h1>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-base-100 p-6 rounded-lg shadow-md border-l-4 border-blue-500">
            <div class="text-base-content/70">Total Classes</div>
            <div class="text-3xl font-bold">{{ $totalClasses }}</div>
        </div>

        <div class="bg-base-100 p-6 rounded-lg shadow-md border-l-4 border-green-500">
            <div class="text-base-content/70">Upcoming Sessions</div>
            <div class="text-3xl font-bold">{{ $upcomingSessions }}</div>
        </div>

        <div class="bg-base-100 p-6 rounded-lg shadow-md border-l-4 border-purple-500">
            <div class="text-base-content/70">Total Clients</div>
            <div class="text-3xl font-bold">{{ $totalClients }}</div>
        </div>
    </div>

    <!-- My Classes Section -->
    <div class="mb-8">
        <h2 class="text-2xl font-bold mb-4">My Classes</h2>
        @if($myClasses->isEmpty())
            <div class="alert alert-info">
                <span>No classes assigned yet.</span>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($myClasses as $class)
                    <div class="card bg-base-100 shadow-xl">
                        <div class="card-body">
                            <h3 class="card-title">{{ $class->name }}</h3>
                            <p class="text-sm text-base-content/70">{{ $class->description }}</p>
                            <div class="divider my-2"></div>
                            <div class="flex justify-between text-sm">
                                <span>Capacity: {{ $class->capacity }}</span>
                                <span>Schedules: {{ $class->schedules_count }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Upcoming Sessions Section -->
    <div>
        <h2 class="text-2xl font-bold mb-4">Upcoming Sessions</h2>
        @if($upcomingSchedules->isEmpty())
            <div class="alert alert-info">
                <span>No upcoming sessions scheduled.</span>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead>
                        <tr>
                            <th>Class</th>
                            <th>Date & Time</th>
                            <th>Duration</th>
                            <th>Attendees</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($upcomingSchedules as $schedule)
                            <tr>
                                <td>{{ $schedule->workoutClass->name }}</td>
                                <td>{{ $schedule->start_time->format('M d, Y - h:i A') }}</td>
                                <td>{{ $schedule->start_time->diffInMinutes($schedule->end_time) }} mins</td>
                                <td>
                                    <span class="badge badge-primary">{{ $schedule->bookings_count }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>