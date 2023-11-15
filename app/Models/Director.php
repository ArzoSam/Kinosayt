<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Director extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'directors';
    protected $guarded = false;

    public function movies()
    {
        return $this->hasMany(Movie::class, 'director_id', 'id');
    }
}
