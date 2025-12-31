<?php

namespace Database\Seeders;

use App\Models\Trainer;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trainers = [
            [
                'name' => 'Alex Bold',
                'specialties' => 'Strength & Conditioning',
                'bio' => 'Former Olympian specializing in heavy lifting and strength training. With over 15 years of experience, Alex helps athletes reach their peak performance.',
            ],
            [
                'name' => 'Sarah Swift',
                'specialties' => 'Yoga & Pilates',
                'bio' => 'Certified yoga and pilates instructor with 10 years of experience. Sarah focuses on flexibility, mindfulness, and core strength.',
            ],
            [
                'name' => 'Mike Cardio',
                'specialties' => 'HIIT & Endurance',
                'bio' => 'High-intensity interval training expert and marathon runner. Pushing your limits and breaking through plateaus is Mike\'s passion.',
            ],
            [
                'name' => 'Emma Power',
                'specialties' => 'CrossFit & Functional Training',
                'bio' => 'CrossFit Level 3 trainer specializing in functional movements and athletic performance. Emma believes in training for life, not just the gym.',
            ],
        ];

        foreach ($trainers as $trainerData) {
            // Create user account for trainer
            $user = User::create([
                'name' => $trainerData['name'],
                'username' => strtolower(str_replace(' ', '', $trainerData['name'])),
                'email' => strtolower(str_replace(' ', '', $trainerData['name'])) . '@alphamode.com',
                'password' => Hash::make('password'),
                'role' => 'trainer',
            ]);

            // Create trainer profile
            Trainer::create([
                'user_id' => $user->id,
                'bio' => $trainerData['bio'],
                'specialties' => $trainerData['specialties'],
            ]);
        }
    }
}
