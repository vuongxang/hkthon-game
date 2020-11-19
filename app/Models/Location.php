<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = "locations";
    protected $fillable = [
        "round_id", "name", "suggest", "code", "description", "created_at", "updated_at",
    ];
}
