<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingProgram extends Model
{
    protected $fillable = ['trainer_id', 'name', 'description'];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function workoutRoutines()
    {
        return $this->hasMany(WorkoutRoutine::class);
    }
}
