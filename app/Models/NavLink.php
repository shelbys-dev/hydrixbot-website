<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NavLink extends Model
{
    protected $fillable = [
        'label',
        'url',
        'is_external',
        'is_active',
        'position',
    ];

    protected $casts = [
        'is_external' => 'boolean',
        'is_active'   => 'boolean',
        'position'    => 'integer',
    ];
}
