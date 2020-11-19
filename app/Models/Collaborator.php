<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collaborator extends Model
{
    protected $table = "collaborators";

    protected $fillable = [
        "user_id", "round_id", "game_id", "status", "created_at", "updated_at",
    ];
}
