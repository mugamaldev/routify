<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\UserRole;
use App\Models\Review;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => UserRole::class,
        ];
    }

    // helper بسيط
    public function hasRole(UserRole|string $role): bool
    {
        if ($role instanceof UserRole) $role = $role->value;
        if ($this->role instanceof UserRole) {
            return $this->role->value === $role;
        }
        return $this->role == $role;
    }

    public function isAdmin(): bool { return $this->hasRole(UserRole::ADMIN); }
    public function isInstructor(): bool { return $this->hasRole(UserRole::INSTRUCTOR); }

    
    public function courses() :HasMany {
        return $this->hasMany(Course::class, 'instructor_id');
    }

    public function enrolledCourses() :BelongsToMany {
        return $this->belongsToMany(Course::class, 'enrollments')->withTimeStamps();
    }

    public function reviews(): HasMany
{
    return $this->hasMany(Review::class);
}
    public function profile() {
        return $this->hasOne(UserProfile::class);
    }

    protected static function boot() {
        parent::boot();
        static::created(function ($user) {
            $user->profile()->create();
        });
    }
}
