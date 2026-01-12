<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavedJob extends Model
{
    protected $table = 'saved_jobs';

    protected $fillable = [
        'user_id',
        'job_id',
    ];
}
