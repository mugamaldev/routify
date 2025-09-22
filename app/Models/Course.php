<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    protected $fillable = [
        'title',
        'course_image',
        'course_video',
        'duration',
        'course_description',
        'price',
        'sale_price',
        'category_id',
        'instructor_id',
    ];

    // Instructor
    public function instructor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    // Students
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'enrollments')->withTimestamps();
    }

    // Reviews
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    // Category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Videos
    public function videos(): HasMany
    {
        return $this->hasMany(CourseVideo::class);
    }

    // Scope for latest courses
    public function scopeLatestCourses($query, $count = 5)
    {
        return $query->orderByDesc('created_at')->take($count);
    }

    public function getAverageRatingAttribute() {
        return $this->reviews()->avg('rating') ?? 0;
    }
}
