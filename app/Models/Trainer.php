<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'bio', 'specialties', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function workoutClasses()
    {
        return $this->hasMany(WorkoutClass::class);
    }

    public function trainingPrograms()
    {
        return $this->hasMany(TrainingProgram::class);
    }

    public function workoutRoutines()
    {
        return $this->hasMany(WorkoutRoutine::class);
    }
}
