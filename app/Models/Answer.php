<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = "answers";

    protected $fillable = [
        "question_id", "type_answers", "content", 'url', 'status', "created_at", "updated_at",
    ];
}
