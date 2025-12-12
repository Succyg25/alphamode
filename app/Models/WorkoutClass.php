<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkoutClass extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'capacity', 'trainer_id'];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function schedules()
    {
        return $this->hasMany(ClassSchedule::class);
    }
}
