<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_DELETE = -1;

    protected $table = "games";
    protected $fillable = [
        "user_id", "title", "description", "status", "created_at", "updated_at",
    ];
}
