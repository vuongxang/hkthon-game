<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "questions";
    protected $fillable = [
        "round_id", "title", "file_id", "point", "suggest", "created_at", "updated_at", 'status'
    ];
}
