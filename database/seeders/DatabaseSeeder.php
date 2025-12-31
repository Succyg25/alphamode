<?php

namespace Database\Seeders;

use App\Models\ClassSchedule;
use App\Models\Trainer;
use App\Models\User;
use App\Models\WorkoutClass;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Plans (constant data)
        $this->call(PlanSeeder::class);

        // Seed Trainers (constant data)
        $this->call(TrainerSeeder::class);

        // Admin User
        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@alphamode.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Member User
        User::create([
            'name' => 'John Doe',
            'username' => 'johndoe',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
            'role' => 'member',
        ]);

        // Sample Classes
        $trainer = Trainer::first();
        if ($trainer) {
            $class1 = WorkoutClass::create([
                'name' => 'Morning Yoga',
                'description' => 'Start your day with zen.',
                'capacity' => 15,
                'trainer_id' => $trainer->id,
            ]);

            ClassSchedule::create([
                'workout_class_id' => $class1->id,
                'start_time' => now()->addDays(1)->setHour(8),
                'end_time' => now()->addDays(1)->setHour(9),
            ]);

            ClassSchedule::create([
                'workout_class_id' => $class1->id,
                'start_time' => now()->addDays(2)->setHour(8),
                'end_time' => now()->addDays(2)->setHour(9),
            ]);
        }
    }
}
