<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoachingVideo extends Model
{
    protected $fillable = [
        'trainer_id',
        'title',
        'description',
        'video_url',
        'thumbnail_url',
        'category',
        'duration',
        'is_featured'
    ];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }
}
