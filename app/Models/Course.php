<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Course extends Model
{
    protected $fillable = [
        'title',
        'description',
        'time',
        'video_url',
        'user_id'
    ];

    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function students() :BelongsToMany {
        return $this->belongsToMany(User::class, 'enrollment')->withTimeStamps();
    }
}
