<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
        'email',
        'password',
        'role',
        'phone',
        'city',
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
        ];
    }

        public function workerProfile()
    {
        return $this->hasOne(WorkerProfile::class, 'user_id');
    }

    public function skills()
    {
        // Through workerProfile pivot
        return $this->belongsToMany(Skill::class, 'worker_skill', 'worker_id', 'skill_id');
    }

    public function workerBookings()
    {
        return $this->hasMany(Booking::class, 'worker_id');
    }

    public function customerBookings()
    {
        return $this->hasMany(Booking::class, 'customer_id');
    }

    public function workerReviews()
    {
        return $this->hasMany(Review::class, 'worker_id');
    }

    public function customerReviews()
    {
        return $this->hasMany(Review::class, 'customer_id');
    }

}
