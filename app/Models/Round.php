<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    protected $table = "rounds";
    protected $fillable = [
        "game_id", "name", "description", "time",'status', "created_at", "updated_at"
    ];
}
