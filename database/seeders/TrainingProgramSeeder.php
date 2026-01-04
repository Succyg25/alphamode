<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainingProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trainer = \App\Models\Trainer::first();
        $user = \App\Models\User::where('role', 'member')->first();

        if ($trainer && $user) {
            $program = \App\Models\TrainingProgram::create([
                'trainer_id' => $trainer->id,
                'name' => 'Muscle Gain 101',
                'description' => 'A comprehensive guide to building muscle mass.',
            ]);

            \App\Models\WorkoutRoutine::create([
                'user_id' => $user->id,
                'trainer_id' => $trainer->id,
                'training_program_id' => $program->id,
                'status' => 'active',
                'progress_notes' => 'Day 1 completed with high intensity.',
            ]);
        }
    }
}
