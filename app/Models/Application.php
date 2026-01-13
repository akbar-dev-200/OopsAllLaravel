<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'applications';

    protected $fillable = [
        'user_id',
        'job_id',
        'resume_snapshot_url',
        'cover_letter',
        'status',
        'applied_at',
    ];

    protected $hidden = [
        'user_id',
        'job_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
