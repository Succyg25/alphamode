<div>
    <div class="mb-8">
        <h1 class="text-3xl font-bold">Welcome, {{ Auth::user()->name }}!</h1>
        <p class="text-gray-600">Here is your fitness overview.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Upcoming Classes -->
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title mb-4">Your Upcoming Classes</h2>
                    @if($upcomingClasses->isEmpty())
                        <div class="alert alert-info">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="stroke-current shrink-0 w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>You have no upcoming classes booked. <a href="{{ route('trainers') }}"
                                    class="link font-bold">Book a class now.</a></span>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="table w-full">
                                <thead>
                                    <tr>
                                        <th>Class</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Trainer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($upcomingClasses as $booking)
                                        <tr>
                                            <td class="font-bold">{{ $booking->schedule->workoutClass->name }}</td>
                                            <td>{{ $booking->schedule->start_time->format('M d, Y') }}</td>
                                            <td>{{ $booking->schedule->start_time->format('H:i') }} -
                                                {{ $booking->schedule->end_time->format('H:i') }}</td>
                                            <td>{{ $booking->schedule->workoutClass->trainer->user->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Recent Activity / Stats (Placeholder) -->
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Recent Activity</h2>
                    <p class="text-gray-500 italic">Activity tracking coming soon...</p>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-8">
            <!-- Membership Status -->
            <div class="card bg-primary text-primary-content shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Membership Status</h2>
                    <p class="text-2xl font-bold">Active</p>
                    <p class="text-sm opacity-80">Plan: Gold Member</p>
                    <div class="card-actions justify-end mt-4">
                        <a href="{{ route('subscription') }}" class="btn btn-sm btn-outline btn-white">Manage Subscription</a>
                    </div>
                </div>
            </div>

            <!-- Profile Quick Links -->
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Quick Links</h2>
                    <ul class="menu bg-base-100 w-full p-0">
                        <li><a href="{{ route('profile') }}">Edit Profile</a></li>
                        <li><a href="{{ route('subscription') }}">Payment Methods</a></li>
                        <li><a href="{{ route('dashboard') }}">Workout History</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>