<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'job_listings';

    protected $fillable = [
        'title',
        'description',
        'employment_type',
        'location',
        'salary_range',
        'status',
    ];

    public function creator()
    {
        return $this->belongsTo(Employer::class, 'creator_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'job_id');
    }

    public function applicants()
    {
        return $this->belongsToMany(
            User::class,
            'applications',
            'job_id',
            'user_id'
        )
            ->withPivot([
                'status',
                'resume_snapshot_url',
                'cover_letter',
                'applied_at',
            ]);
    }

    public function savedByUsers()
    {
        return $this->belongsToMany(
            User::class,
            'saved_jobs',
            'job_id',
            'user_id'
        )
            ->withTimestamps();
    }
}
