<?php

namespace App\Livewire\Admin;

use App\Models\Booking;
use App\Models\ClassSchedule;
use App\Models\Plan;
use App\Models\Trainer;
use App\Models\User;
use App\Models\WorkoutClass;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
#[Title('Admin Dashboard')]
class Dashboard extends Component
{
    public function render()
    {
        // 1. Key Metrics
        $totalMembers = User::where('role', 'member')->count();
        $activeTrainers = User::where('role', 'trainer')->count();

        // Revenue Calculation (Approximation based on active plans)
        $currentMonthRevenue = User::where('role', 'member')
            ->whereNotNull('current_plan_id')
            ->join('plans', 'users.current_plan_id', '=', 'plans.id')
            ->sum('plans.price');

        $monthlyBookings = Booking::whereMonth('created_at', now()->month)->count();

        // 2. Upcoming Schedule
        $upcomingClasses = ClassSchedule::with(['workoutClass.trainer.user'])
            ->where('start_time', '>', now())
            ->orderBy('start_time', 'asc')
            ->limit(5)
            ->get();

        // 3. Recent Members
        $recentMembers = User::where('role', 'member')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // 4. Recent Activity (All Bookings)
        $recentActivity = Booking::with(['user', 'schedule.workoutClass'])
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return view('livewire.admin.dashboard', [
            'totalMembers' => $totalMembers,
            'activeTrainers' => $activeTrainers,
            'currentMonthRevenue' => $currentMonthRevenue,
            'monthlyBookings' => $monthlyBookings,
            'upcomingClasses' => $upcomingClasses,
            'recentMembers' => $recentMembers,
            'recentActivity' => $recentActivity,
        ]);
    }

    public function activePlans()
    {
        return Plan::where('status', 'active')->count();
    }
}
