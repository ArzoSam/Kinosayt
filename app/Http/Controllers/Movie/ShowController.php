<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Movie;
use App\Models\Product;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Movie $movie)
    {
        $comments = Comment::where('movie_id', $movie->id)->paginate(5);
        $overall = $movie->comments->avg('rating');
        $overall = round($overall, 1);

        return view('movie.show', compact('movie', 'overall', 'comments'));
    }
    public function fetch_data(Movie $movie,Request $request)
    {
        if ($request->ajax())
        {
            $comments = Comment::where('movie_id', $movie->id)->paginate(5);

            return view('movie.comments', compact('comments'))->render();
        }
    }
}
