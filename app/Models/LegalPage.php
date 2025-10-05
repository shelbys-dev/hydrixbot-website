<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LegalPage extends Model
{
    protected $fillable = ['type', 'version', 'content', 'effective_date', 'is_active'];
    protected $casts = ['effective_date' => 'datetime', 'is_active' => 'boolean'];

    public static function latestFor(string $type): ?self
    {
        return static::where('type', $type)
            ->orderByDesc('effective_date')
            ->orderByDesc('id')
            ->first();
    }
}
