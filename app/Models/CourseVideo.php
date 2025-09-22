<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourseVideo extends Model
{
    protected $fillable = [
        'course_id',
        'title',
        'video_url',
        'duration',
        'description'
    ];

    public function course() :BelongsTo {
        return $this->belongsTo(Course::class);
    }
}
