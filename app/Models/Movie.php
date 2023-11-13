<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'movies';
    protected $guarded = false;

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'movie_actors', 'movie_id', 'actor_id');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genres', 'movie_id', 'genre_id');
    }

    public function directors()
    {
        return $this->belongsTo(Director::class, 'director_id', 'id');
    }
    public function likedUsers()
    {
        return $this->belongsToMany(User::class, 'movie_user_likes', 'movie_id', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'movie_id', 'id');
    }
}
