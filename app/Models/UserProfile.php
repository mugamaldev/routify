<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'full_name',
        'occupation',
        'company_name',
        'phone',
        'address',
        'city',
        'linkedin',
        'facebook',
        'twitter',
        'instagram',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
