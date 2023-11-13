<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieUserLike extends Model
{
    use HasFactory;

    protected $table = 'movie_user_likes';
    protected $guarded = false;
}