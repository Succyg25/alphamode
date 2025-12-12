<?php

namespace Database\Seeders;

use App\Models\ClassSchedule;
use App\Models\Plan;
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

        // Plans
        Plan::create(['name' => 'Fighter Tier', 'price' => 29.99, 'duration_days' => 30, 'description' => 'Basic access to gym facilities.']);
        Plan::create(['name' => 'Spartan Tier', 'price' => 79.99, 'duration_days' => 90, 'description' => 'Access to gym + 2 group classes per week.']);
        Plan::create(['name' => 'Titan Tier', 'price' => 299.99, 'duration_days' => 365, 'description' => 'Unlimited access, personal trainer sessions, and spa.']);

        // Trainers
        $trainersData = [
            ['name' => 'Alex Bold', 'specialties' => 'Strength & Conditioning', 'bio' => 'Former Olympian specializing in heavy lifting.'],
            ['name' => 'Sarah Swift', 'specialties' => 'Yoga & Pilates', 'bio' => 'Certified instructor with 10 years of experience.'],
            ['name' => 'Mike Cardio', 'specialties' => 'HIIT & Endurance', 'bio' => 'Pushing your limits is my passion.'],
        ];

        foreach ($trainersData as $t) {
            $u = User::create([
                'name' => $t['name'],
                'username' => strtolower(str_replace(' ', '', $t['name'])),
                'email' => strtolower(str_replace(' ', '', $t['name'])) . '@alphamode.com',
                'password' => Hash::make('password'),
                'role' => 'trainer',
            ]);

            Trainer::create([
                'user_id' => $u->id,
                'bio' => $t['bio'],
                'specialties' => $t['specialties'],
            ]);
        }

        // Classes
        $trainer = Trainer::first();
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
