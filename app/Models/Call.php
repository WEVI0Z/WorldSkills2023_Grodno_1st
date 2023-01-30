<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $fillable = [
        "pet", "photo", "photo_after", "user_id", "status"
    ];

    use HasFactory;
}
