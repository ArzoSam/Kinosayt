<?php

namespace App\Http\Controllers\Admin\Movie;

use App\Http\Controllers\Controller;
use App\Models\Director;
use App\Models\Movie;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    public function __invoke(Movie $movie)
    {
        return view('admin.movie.show', compact('movie'));
    }
}
