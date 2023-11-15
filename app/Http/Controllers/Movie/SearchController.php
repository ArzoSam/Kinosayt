<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use App\Models\Director;
use App\Models\Filter\Filter;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search_text = $_GET['movie'];
        $movies = Movie::query()->where('title', 'LIKE', '%' . $search_text . '%');
        $years = Movie::get('year');
        $actors = Actor::all();
        $directors = Director::all();
        $genres = Genre::all();
        if (isset($request->genres) && isset($request->years)) {
            $genresA = array_map('intval', $request->genres);
            $yearsA = array_map('intval', $request->years);
            $moviesQuery = Filter::filterFilms($movies, $genresA, $yearsA);
            $movies = $moviesQuery->orderBy('title');
        } elseif (isset($request->genres) && isset($request->years) == false) {
            $genresA = array_map('intval', $request->genres);
            $moviesQuery = Filter::filterByGenres($movies, $genresA);
            $movies = $moviesQuery->orderBy('title');
        } elseif (isset($request->genres) == false && isset($request->years)) {
            $yearsA = array_map('intval', $request->years);
            $moviesQuery = Filter::filterByYears($movies, $yearsA);
            $movies = $moviesQuery->orderBy('title');
        }
        $movies = $movies->paginate(25);
        return view('movie.index', compact('movies', 'years', 'genres', 'actors', 'directors'));
    }
}
