<?php

namespace App\Http\Controllers\Movie\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Movie\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Movie $movie, StoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['movie_id'] = $movie->id;
        Comment::create($data);
        return redirect()->route('movie.show', $movie->id);
    }
}
