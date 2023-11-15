<?php

namespace App\Http\Controllers\Admin\Movie;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use App\Models\Director;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class EditController extends BaseController
{
    public function __invoke(Movie $movie)
    {
        $actors = Actor::all();
        $genres = Genre::all();
        $directors = Director::all();
        return view('admin.movie.edit', compact('movie', 'actors', 'genres', 'directors'));
    }
}
