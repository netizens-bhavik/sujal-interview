<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JokeRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'joke_id',
        'user_id',
        'rating',
    ];
}
