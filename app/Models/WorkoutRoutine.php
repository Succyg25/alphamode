<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkoutRoutine extends Model
{
    protected $fillable = ['user_id', 'trainer_id', 'training_program_id', 'status', 'progress_notes'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function trainingProgram()
    {
        return $this->belongsTo(TrainingProgram::class);
    }
}
