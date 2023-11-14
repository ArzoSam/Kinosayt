<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use App\Models\Director;
use App\Models\Filter\Filter;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $movies = Movie::query();
        $years = Movie::get('year');
        $directors = Director::all();
        $actors = Actor::all();
        if (isset($request->valueBy) && isset($request->filter) == false) {
//            dd($request->valueBy);
            if ($request->valueBy == 'sbn') {
                $movies = $movies->orderBy('created_at', 'desc');
            } elseif ($request->valueBy == 'sbr') {
                $movies = $movies->with('comments')
                    ->select('movies.*', DB::raw('AVG(comments.rating) as average_rating'))
                    ->leftJoin('comments', 'movies.id', '=', 'comments.movie_id')
                    ->groupBy('movies.id')
                    ->orderBy('average_rating', 'desc');
            }
        } elseif (isset($request->valueBy) && isset($request->filter)) {
            if ($request->valueBy == 'sbr') {
                if (isset($request->director) && isset($request->years) && isset($request->actors)) {
                    $directorA = array_map('intval', $request->director);
                    $yearsA = array_map('intval', $request->years);
                    $actorsA = array_map('intval', $request->actors);
                    $moviesQuery = Filter::filterFilms($movies, $directorA, $yearsA, $actorsA);
                    $movies = $moviesQuery->with('comments')
                        ->select('movies.*', DB::raw('AVG(comments.rating) as average_rating'))
                        ->leftJoin('comments', 'movies.id', '=', 'comments.movie_id')
                        ->groupBy('movies.id')
                        ->orderBy('average_rating', 'desc');
                } elseif (isset($request->director) && isset($request->years) == false && isset($request->actors) == false) {
                    $directorA = array_map('intval', $request->director);
                    $moviesQuery = Filter::filterByDirectors($movies, $directorA);
                    $movies = $moviesQuery->with('comments')
                        ->select('movies.*', DB::raw('AVG(comments.rating) as average_rating'))
                        ->leftJoin('comments', 'movies.id', '=', 'comments.movie_id')
                        ->groupBy('movies.id')
                        ->orderBy('average_rating', 'desc');
                } elseif (isset($request->director) == false && isset($request->years) && isset($request->actors) == false) {
                    $yearsA = array_map('intval', $request->years);
                    $moviesQuery = Filter::filterByYears($movies, $yearsA);
                    $movies = $moviesQuery->with('comments')
                        ->select('movies.*', DB::raw('AVG(comments.rating) as average_rating'))
                        ->leftJoin('comments', 'movies.id', '=', 'comments.movie_id')
                        ->groupBy('movies.id')
                        ->orderBy('average_rating', 'desc');
                } elseif (isset($request->director) == false && isset($request->years) == false && isset($request->actors)) {
                    $actorsA = array_map('intval', $request->actors);
                    $moviesQuery = Filter::filterByActors($movies, $actorsA);
                    $movies = $moviesQuery->with('comments')
                        ->select('movies.*', DB::raw('AVG(comments.rating) as average_rating'))
                        ->leftJoin('comments', 'movies.id', '=', 'comments.movie_id')
                        ->groupBy('movies.id')
                        ->orderBy('average_rating', 'desc');
                } elseif (isset($request->director) == false && isset($request->years) && isset($request->actors)) {
                    $yearsA = array_map('intval', $request->years);
                    $actorsA = array_map('intval', $request->actors);
                    $moviesQuery = Filter::filterByActorsYears($movies, $yearsA, $actorsA);
                    $movies = $moviesQuery->with('comments')
                        ->select('movies.*', DB::raw('AVG(comments.rating) as average_rating'))
                        ->leftJoin('comments', 'movies.id', '=', 'comments.movie_id')
                        ->groupBy('movies.id')
                        ->orderBy('average_rating', 'desc');
                } elseif (isset($request->director) && isset($request->years) == false && isset($request->actors)) {
                    $directorA = array_map('intval', $request->director);
                    $actorsA = array_map('intval', $request->actors);
                    $moviesQuery = Filter::filterByActorsDirector($movies, $directorA, $actorsA);
                    $movies = $moviesQuery->with('comments')
                        ->select('movies.*', DB::raw('AVG(comments.rating) as average_rating'))
                        ->leftJoin('comments', 'movies.id', '=', 'comments.movie_id')
                        ->groupBy('movies.id')
                        ->orderBy('average_rating', 'desc');
                } elseif (isset($request->director) && isset($request->years) && isset($request->actors) == false) {
                    $directorA = array_map('intval', $request->director);
                    $yearsA = array_map('intval', $request->years);
                    $moviesQuery = Filter::filterByYearsDirector($movies, $directorA, $yearsA);
                    $movies = $moviesQuery->with('comments')
                        ->select('movies.*', DB::raw('AVG(comments.rating) as average_rating'))
                        ->leftJoin('comments', 'movies.id', '=', 'comments.movie_id')
                        ->groupBy('movies.id')
                        ->orderBy('average_rating', 'desc');
                }
            }elseif ($request->valueBy == 'sbn') {
                if (isset($request->director) && isset($request->years) && isset($request->actors)) {
                    $directorA = array_map('intval', $request->director);
                    $yearsA = array_map('intval', $request->years);
                    $actorsA = array_map('intval', $request->actors);
                    $moviesQuery = Filter::filterFilms($movies, $directorA, $yearsA, $actorsA);
                    $movies = $moviesQuery->orderBy('created_at', 'desc');
                } elseif (isset($request->director) && isset($request->years) == false && isset($request->actors) == false) {
                    $directorA = array_map('intval', $request->director);
                    $moviesQuery = Filter::filterByDirectors($movies, $directorA);
                    $movies = $moviesQuery->orderBy('created_at', 'desc');
                } elseif (isset($request->director) == false && isset($request->years) && isset($request->actors) == false) {
                    $yearsA = array_map('intval', $request->years);
                    $moviesQuery = Filter::filterByYears($movies, $yearsA);
                    $movies = $moviesQuery->orderBy('created_at', 'desc');
                } elseif (isset($request->director) == false && isset($request->years) == false && isset($request->actors)) {
                    $actorsA = array_map('intval', $request->actors);
                    $moviesQuery = Filter::filterByActors($movies, $actorsA);
                    $movies = $moviesQuery->orderBy('created_at', 'desc');
                } elseif (isset($request->director) == false && isset($request->years) && isset($request->actors)) {
                    $yearsA = array_map('intval', $request->years);
                    $actorsA = array_map('intval', $request->actors);
                    $moviesQuery = Filter::filterByActorsYears($movies, $yearsA, $actorsA);
                    $movies = $moviesQuery->orderBy('created_at', 'desc');
                } elseif (isset($request->director) && isset($request->years) == false && isset($request->actors)) {
                    $directorA = array_map('intval', $request->director);
                    $actorsA = array_map('intval', $request->actors);
                    $moviesQuery = Filter::filterByActorsDirector($movies, $directorA, $actorsA);
                    $movies = $moviesQuery->orderBy('created_at', 'desc');
                } elseif (isset($request->director) && isset($request->years) && isset($request->actors) == false) {
                    $directorA = array_map('intval', $request->director);
                    $yearsA = array_map('intval', $request->years);
                    $moviesQuery = Filter::filterByYearsDirector($movies, $directorA, $yearsA);
                    $movies = $moviesQuery->orderBy('created_at', 'desc');
                }
            }
        } elseif (isset($request->valueBy) == false && isset($request->filter)) {
            if (isset($request->director) && isset($request->years) && isset($request->actors)) {
                $directorA = array_map('intval', $request->director);
                $yearsA = array_map('intval', $request->years);
                $actorsA = array_map('intval', $request->actors);
                $moviesQuery = Filter::filterFilms($movies, $directorA, $yearsA, $actorsA);
                $movies = $moviesQuery->orderBy('title');
            } elseif (isset($request->director) && isset($request->years) == false && isset($request->actors) == false) {
                $directorA = array_map('intval', $request->director);
                $moviesQuery = Filter::filterByDirectors($movies, $directorA);
                $movies = $moviesQuery->orderBy('title');
            } elseif (isset($request->director) == false && isset($request->years) && isset($request->actors) == false) {
                $yearsA = array_map('intval', $request->years);
                $moviesQuery = Filter::filterByYears($movies, $yearsA);
                $movies = $moviesQuery->orderBy('title');
            } elseif (isset($request->director) == false && isset($request->years) == false && isset($request->actors)) {
                $actorsA = array_map('intval', $request->actors);
                $moviesQuery = Filter::filterByActors($movies, $actorsA);
                $movies = $moviesQuery->orderBy('title');
            } elseif (isset($request->director) == false && isset($request->years) && isset($request->actors)) {
                $yearsA = array_map('intval', $request->years);
                $actorsA = array_map('intval', $request->actors);
                $moviesQuery = Filter::filterByActorsYears($movies, $yearsA, $actorsA);
                $movies = $moviesQuery->orderBy('title');
            } elseif (isset($request->director) && isset($request->years) == false && isset($request->actors)) {
                $directorA = array_map('intval', $request->director);
                $actorsA = array_map('intval', $request->actors);
                $moviesQuery = Filter::filterByActorsDirector($movies, $directorA, $actorsA);
                $movies = $moviesQuery->orderBy('title');
            } elseif (isset($request->director) && isset($request->years) && isset($request->actors) == false) {
                $directorA = array_map('intval', $request->director);
                $yearsA = array_map('intval', $request->years);
                $moviesQuery = Filter::filterByYearsDirector($movies, $directorA, $yearsA);
                $movies = $moviesQuery->orderBy('title');
            }
        }
        if (isset($request->year_filter)) {
            $fromYear = $request->year_from;
            $toYear = $request->year_to;
            $movies = $movies->whereBetween('year', [$fromYear, $toYear])
                ->orderBy('year', 'desc');
        }elseif (isset($request->rate_filter)) {
            $fromRate = $request->rate_from;
            $toRate = $request->rate_to;
            $movies = $movies->whereHas('comments', function ($query) use ($fromRate, $toRate) {
                $query->select(DB::raw('AVG(comments.rating) as average_rating'))
                    ->groupBy('movie_id')
                    ->havingRaw('average_rating BETWEEN ? AND ?', [$fromRate, $toRate]);
            });
        }
        $movies = $movies->paginate(25);
        return view('movie.index', compact('movies', 'directors', 'years', 'actors'));
    }
}
