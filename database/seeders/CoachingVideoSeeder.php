<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoachingVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trainer = \App\Models\Trainer::first();

        if ($trainer) {
            $videos = [
                [
                    'trainer_id' => $trainer->id,
                    'title' => 'Morning Mobility Routine',
                    'description' => 'A daily 10-minute routine to wake up your joints and improve flexibility.',
                    'video_url' => 'https://www.youtube.com/embed/L_xrDAtykMI', // Placeholder
                    'thumbnail_url' => 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?auto=format&fit=crop&q=80&w=800',
                    'category' => 'Daily Video',
                    'duration' => '10:00',
                    'is_featured' => true,
                ],
                [
                    'trainer_id' => $trainer->id,
                    'title' => 'Perfect Form: The Deadlift',
                    'description' => 'Break down the technique for a safe and powerful deadlift.',
                    'video_url' => 'https://www.youtube.com/embed/op9kVnSso6Q', // Placeholder
                    'thumbnail_url' => 'https://images.unsplash.com/photo-1517836357463-d25dfeac3438?auto=format&fit=crop&q=80&w=800',
                    'category' => 'Technical',
                    'duration' => '15:20',
                    'is_featured' => false,
                ],
                [
                    'trainer_id' => $trainer->id,
                    'title' => 'HIIT Burner: 20 Mins',
                    'description' => 'No equipment needed. High intensity interval training for maximum calorie burn.',
                    'video_url' => 'https://www.youtube.com/embed/ml6cT4AZdqI', // Placeholder
                    'thumbnail_url' => 'https://images.unsplash.com/photo-1517838277536-f5f99aa530cd?auto=format&fit=crop&q=80&w=800',
                    'category' => 'Workout',
                    'duration' => '20:00',
                    'is_featured' => false,
                ],
            ];

            foreach ($videos as $video) {
                \App\Models\CoachingVideo::create($video);
            }
        }
    }
}
