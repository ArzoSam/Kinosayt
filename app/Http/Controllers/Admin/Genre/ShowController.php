<?php

namespace App\Http\Controllers\Admin\Genre;

use App\Http\Controllers\Controller;
use App\Models\Director;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Genre $genre)
    {
        return view('admin.genre.show', compact('genre'));
    }
}
