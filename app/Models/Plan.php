<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'duration_days', 'description'];

    public function getCardColorAttribute()
    {
        return match ($this->name) {
            'Fighter Tier' => '#572e06ff', // Bronze
            'Spartan Tier' => '#C0C0C0', // Silver
            'Titan Tier' => '#ffd700ff',   // Gold
            default => '', // Use default class if empty or handle in view
        };
    }
    public function getTextColorAttribute()
    {
        return match ($this->name) {
            'Fighter Tier' => 'text-white',
            'Spartan Tier' => 'text-black',
            'Titan Tier' => 'text-black',
            default => 'text-primary-content',
        };
    }
}
