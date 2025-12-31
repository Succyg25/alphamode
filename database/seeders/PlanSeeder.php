<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Fighter Tier',
                'price' => 29.99,
                'duration_days' => 30,
                'description' => 'Basic access to gym facilities and equipment. Perfect for those starting their fitness journey.',
            ],
            [
                'name' => 'Spartan Tier',
                'price' => 79.99,
                'duration_days' => 90,
                'description' => 'Full gym access plus 2 group classes per week. Ideal for committed fitness enthusiasts.',
            ],
            [
                'name' => 'Titan Tier',
                'price' => 299.99,
                'duration_days' => 365,
                'description' => 'Unlimited access to all facilities, personal trainer sessions, group classes, and spa amenities. The ultimate fitness experience.',
            ],
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
