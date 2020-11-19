<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{

    protected $table = "files";
    protected $fillable = [
        "status", "url", "created_at", "updated_at",
    ];
}
