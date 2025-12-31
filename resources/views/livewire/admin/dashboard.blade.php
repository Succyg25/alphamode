@section('title', 'Admin Dashboard')

<div class="space-y-8">
    {{-- Key Metrics Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
        {{-- Total Members --}}
        <div class="relative group h-full">
            <div
                class="absolute -inset-0.5 bg-gradient-to-r from-emerald-600 to-emerald-700 rounded-2xl blur opacity-20 group-hover:opacity-30 transition">
            </div>
            <div
                class="relative bg-white/90 dark:bg-gray-900/90 backdrop-blur-xl p-4 md:p-6 rounded-2xl border border-gray-200 dark:border-gray-800 h-full flex flex-col">
                <div class="flex items-center justify-between mb-auto">
                    <div>
                        <p class="text-xs md:text-sm text-gray-600 dark:text-gray-400 font-medium mb-1">Total Members</p>
                        <p class="text-2xl md:text-3xl font-bold text-emerald-600 dark:text-emerald-400">{{ $totalMembers }}</p>
                    </div>
                    <div
                        class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-emerald-100 to-emerald-200 dark:from-emerald-900/50 dark:to-emerald-800/50 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Active gym members</p>
            </div>
        </div>

        {{-- Monthly Bookings --}}
        <div class="relative group h-full">
            <div
                class="absolute -inset-0.5 bg-gradient-to-r from-yellow-600 to-yellow-700 rounded-2xl blur opacity-20 group-hover:opacity-30 transition">
            </div>
            <div
                class="relative bg-white/90 dark:bg-gray-900/90 backdrop-blur-xl p-4 md:p-6 rounded-2xl border border-gray-200 dark:border-gray-800 h-full flex flex-col">
                <div class="flex items-center justify-between mb-auto">
                    <div>
                        <p class="text-xs md:text-sm text-gray-600 dark:text-gray-400 font-medium mb-1">Monthly Bookings</p>
                        <p class="text-2xl md:text-3xl font-bold text-yellow-600 dark:text-yellow-400">{{ $monthlyBookings }}</p>
                    </div>
                    <div
                        class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-yellow-100 to-yellow-200 dark:from-yellow-900/50 dark:to-yellow-800/50 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Class reservations this month</p>
            </div>
        </div>

        {{-- Active Trainers --}}
        <div class="relative group h-full">
            <div
                class="absolute -inset-0.5 bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl blur opacity-20 group-hover:opacity-30 transition">
            </div>
            <div
                class="relative bg-white/90 dark:bg-gray-900/90 backdrop-blur-xl p-4 md:p-6 rounded-2xl border border-gray-200 dark:border-gray-800 h-full flex flex-col">
                <div class="flex items-center justify-between mb-auto">
                    <div>
                        <p class="text-xs md:text-sm text-gray-600 dark:text-gray-400 font-medium mb-1">Active Trainers</p>
                        <p class="text-2xl md:text-3xl font-bold text-blue-600 dark:text-blue-400">{{ $activeTrainers }}</p>
                    </div>
                    <div
                        class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-blue-100 to-blue-200 dark:from-blue-900/50 dark:to-blue-800/50 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                </div>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Staff members available</p>
            </div>
        </div>

        {{-- Est. Revenue --}}
        <div class="relative group h-full">
            <div
                class="absolute -inset-0.5 bg-gradient-to-r from-purple-600 to-purple-700 rounded-2xl blur opacity-20 group-hover:opacity-30 transition">
            </div>
            <div
                class="relative bg-white/90 dark:bg-gray-900/90 backdrop-blur-xl p-4 md:p-6 rounded-2xl border border-gray-200 dark:border-gray-800 h-full flex flex-col">
                <div class="flex items-center justify-between mb-2">
                    <div>
                        <p class="text-xs md:text-sm text-gray-600 dark:text-gray-400 font-medium mb-1">Est. Monthly Revenue</p>
                        <p class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white">${{ number_format($currentMonthRevenue, 2) }}
                        </p>
                    </div>
                    <div
                        class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-purple-100 to-purple-200 dark:from-purple-900/50 dark:to-purple-800/50 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-auto">Based on active plans</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 md:gap-8">
        {{-- Activity & Schedule (2/3 width) --}}
        <div class="lg:col-span-2 space-y-6">
            {{-- Upcoming Classes --}}
            <div class="relative group">
                <div
                    class="absolute -inset-1 bg-gradient-to-r from-red-600 via-orange-600 to-yellow-600 rounded-3xl blur-xl opacity-20 transition">
                </div>
                <div class="relative bg-white/90 dark:bg-gray-900/90 backdrop-blur-xl rounded-3xl border border-gray-200 dark:border-gray-800 overflow-hidden">
                    <div
                        class="px-4 md:px-8 py-4 md:py-6 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-red-50 to-orange-50 dark:from-red-900/20 dark:to-orange-900/20">
                        <h3 class="text-xl md:text-2xl font-display font-bold text-gray-900 dark:text-white flex items-center gap-2">
                            <svg class="w-5 h-5 md:w-6 md:h-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Upcoming Schedule
                        </h3>
                        <p class="text-xs md:text-sm text-gray-600 dark:text-gray-400 mt-1">Next 5 scheduled classes</p>
                    </div>

                    <div class="p-4 md:p-6 space-y-4">
                        @forelse($upcomingClasses as $class)
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 sm:gap-4 p-3 md:p-4 bg-orange-50/50 dark:bg-orange-900/20 rounded-xl hover:bg-orange-100/50 dark:hover:bg-orange-900/30 transition border border-orange-100 dark:border-orange-800/30">
                                <div class="flex-1 min-w-0">
                                    <p class="font-semibold text-gray-900 dark:text-gray-100 truncate">{{ $class->workoutClass->name }}</p>
                                    <p class="text-xs md:text-sm text-gray-600 dark:text-gray-300">
                                         with {{ $class->workoutClass->trainer->user->name }} • 
                                         {{ $class->start_time->format('M d, H:i') }}
                                    </p>
                                </div>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 dark:bg-orange-900/50 text-orange-800 dark:text-orange-200">
                                    {{ $class->start_time->diffForHumans() }}
                                </span>
                            </div>
                        @empty
                            <p class="text-center text-gray-500 dark:text-gray-400 py-4">No upcoming classes scheduled.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            {{-- New Members --}}
            <div class="relative group">
                <div class="absolute -inset-1 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-3xl blur-xl opacity-20 transition"></div>
                <div class="relative bg-white/90 dark:bg-gray-900/90 backdrop-blur-xl rounded-3xl border border-gray-200 dark:border-gray-800 overflow-hidden">
                    <div class="px-4 md:px-8 py-4 border-b border-gray-200 dark:border-gray-700 bg-gradient-to-r from-emerald-50 to-teal-50 dark:from-emerald-900/20 dark:to-teal-900/20">
                        <h3 class="text-lg font-display font-bold text-gray-900 dark:text-white">Newest Members</h3>
                    </div>
                    <div class="p-4 md:p-6 space-y-4">
                        @forelse($recentMembers as $member)
                            <div class="flex items-center justify-between p-3 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-800 transition border border-transparent hover:border-gray-200 dark:hover:border-gray-700">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-emerald-100 dark:bg-emerald-900/50 flex items-center justify-center text-emerald-700 dark:text-emerald-400 font-bold text-sm">
                                        {{ substr($member->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900 dark:text-gray-100">{{ $member->name }}</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ $member->email }}</p>
                                    </div>
                                </div>
                                <span class="text-xs text-gray-400">{{ $member->created_at->diffForHumans() }}</span>
                            </div>
                        @empty
                            <p class="text-center text-gray-500 dark:text-gray-400">No new members found.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        {{-- Recent Activity Feed --}}
        <div class="lg:col-span-1">
            <div class="relative group sticky top-24">
                <div
                    class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-purple-600 rounded-3xl blur-xl opacity-15 transition">
                </div>
                <div class="relative bg-white/90 dark:bg-gray-900/90 backdrop-blur-xl rounded-3xl border border-gray-200 dark:border-gray-800 overflow-hidden">
                    <div class="px-4 md:px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg md:text-xl font-display font-bold text-gray-900 dark:text-white">Recent Activity</h3>
                        <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">Latest system actions</p>
                    </div>

                    <div class="p-4 md:p-6 max-h-[600px] overflow-y-auto">
                        @if($recentActivity->count() > 0)
                            <div class="space-y-4">
                                @foreach($recentActivity as $activity)
                                    <div class="flex gap-3 text-sm">
                                        <div class="flex-shrink-0 mt-0.5">
                                            <div class="w-8 h-8 bg-blue-100 dark:bg-blue-900/40 rounded-full flex items-center justify-center">
                                                <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-gray-900 dark:text-gray-200 font-medium">
                                                <span class="font-semibold">{{ $activity->user->name }}</span>
                                                booked
                                                <span class="font-semibold">{{ $activity->schedule->workoutClass->name }}</span>
                                            </p>
                                            <p class="text-xs text-gray-400 mt-0.5">{{ $activity->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8">
                                <p class="text-gray-500 dark:text-gray-400 text-sm">No recent activity</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
