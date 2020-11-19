<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = "players";
    protected $fillable = [
        "user_id", "team_id", "created_at", "updated_at",
    ];
}
