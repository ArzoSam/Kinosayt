<?php

namespace App\Http\Controllers\Admin\Genre;

use App\Http\Controllers\Controller;
use App\Models\Director;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $genres = Genre::all();
        return view('admin.genre.index', compact('genres'));
    }
}
