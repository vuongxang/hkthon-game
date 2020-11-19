<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamAnswer extends Model
{
    protected $table = "team_answers";
    protected $fillable = [
        "question_id", "team_id", "content", "file_id", "created_at", "updated_at",
    ];
}
