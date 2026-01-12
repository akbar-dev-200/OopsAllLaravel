<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = [
        'name',
        'website_url',
        'industry',
        'logo_url',
        'description',
        'headquarters_location',
    ];
}
