<?php

namespace App\Http\Controllers\Movie\Like;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Movie;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Movie $movie)
    {
        auth()->user()->likedPosts()->toggle($movie->id);
        return redirect()->back();
    }
}
