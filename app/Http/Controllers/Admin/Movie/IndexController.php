<?php

namespace App\Http\Controllers\Admin\Movie;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $movies = Movie::all();
        return view('admin.movie.index', compact('movies'));
    }
}
