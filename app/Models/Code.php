<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_DELETE = -1;
    public $timestamps = false;
    protected $table = "codes";
    protected $fillable = [
        "game_id", "code", "status", "created_at"
    ];
}
