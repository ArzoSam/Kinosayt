<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Movie $movie)
    {
        auth()->user()->likedPosts()->detach($movie->id);
        return redirect()->route('personal.liked.index');
    }
}
