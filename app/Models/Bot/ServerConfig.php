<?php

namespace App\Models\Bot;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServerConfig extends Model
{
    protected $connection = 'mysql_bot';
    protected $table = 'serverconfig';
    public $timestamps = false;
    protected $guarded = [];

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class, 'serverconfig_id');
    }
}
