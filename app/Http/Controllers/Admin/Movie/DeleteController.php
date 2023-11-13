<?php

namespace App\Http\Controllers\Admin\Movie;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class DeleteController extends BaseController
{
    public function __invoke(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('admin.movie.index');
    }
}
