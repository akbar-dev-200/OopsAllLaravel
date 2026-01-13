<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function employer()
    {
        return $this->hasOne(Employer::class, 'user_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'user_id');
    }

    public function appliedjobs()
    {
        return $this->belongsToMany(Job::class, 'applications', 'user_id', 'job_id')
            ->withPivot('resume_snapshot_url', 'cover_letter', 'status', 'applied_at')
            ->withTimestamps();
    }

    public function savedjobs()
    {
        return $this->belongsToMany(Job::class, 'saved_jobs', 'user_id', 'job_id')
            ->withTimestamps();
    }
}
