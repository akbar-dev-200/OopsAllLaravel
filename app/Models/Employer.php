<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $table = 'employers';

    protected $fillable = [
        'user_id',
        'company_id',
        'position_title',
        'is_admin_of_company',
    ];
}
