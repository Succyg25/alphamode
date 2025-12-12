<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
    use HasFactory;

    protected $fillable = ['workout_class_id', 'start_time', 'end_time'];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function workoutClass()
    {
        return $this->belongsTo(WorkoutClass::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
