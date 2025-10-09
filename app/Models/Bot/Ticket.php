<?php

namespace App\Models\Bot;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    protected $connection = 'mysql_bot';
    protected $table = 'tickets';
    public $timestamps = false;
    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime',
        'closed_at'  => 'datetime',
    ];

    public function serverconfig(): BelongsTo
    {
        return $this->belongsTo(ServerConfig::class, 'serverconfig_id');
    }
}
