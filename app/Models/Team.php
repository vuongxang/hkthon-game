<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = "teams";
    protected $fillable = [
        "game_id", "name", "file_id", "point", "description", "created_at", "updated_at",
    ];
}
