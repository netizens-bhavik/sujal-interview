<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joke extends Model
{
    use HasFactory;

    protected $fillable = [
        'joke',
        'joke_original_id'
    ];

    public function ratings()
    {
        return $this->hasMany('App\Models\JokeRating','joke_id','id');
    }
}
