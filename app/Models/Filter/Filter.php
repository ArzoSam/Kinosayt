<?php

namespace App\Models\Filter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    public static function filterFilms($query, $director, $years, $actors)
    {
        if (!empty($director)) {
            $query->whereHas('directors', function ($query) use ($director) {
                $query->whereIn('director_id', $director);
            });
        }

        if (!empty($actors)) {
            $query->whereHas('actors', function ($query) use ($actors) {
                $query->whereIn('actor_id', $actors);
            });
        }

        if (!empty($years)) {
            $query->whereIn('year', $years);
        }

        return $query;
    }
    public static function filterByYearsDirector($query, $director, $years)
    {
        if (!empty($director)) {
            $query->whereHas('directors', function ($query) use ($director) {
                $query->whereIn('director_id', $director);
            });
        }

        if (!empty($years)) {
            $query->whereIn('year', $years);
        }

        return $query;
    }
    public static function filterByActorsDirector($query, $director, $actors)
    {
        if (!empty($director)) {
            $query->whereHas('directors', function ($query) use ($director) {
                $query->whereIn('director_id', $director);
            });
        }

        if (!empty($actors)) {
            $query->whereHas('actors', function ($query) use ($actors) {
                $query->whereIn('actor_id', $actors);
            });
        }

        return $query;
    }
    public static function filterByActorsYears($query, $years, $actors)
    {
        if (!empty($actors)) {
            $query->whereHas('actors', function ($query) use ($actors) {
                $query->whereIn('actor_id', $actors);
            });
        }

        if (!empty($years)) {
            $query->whereIn('year', $years);
        }

        return $query;
    }
    public static function filterByDirectors($query, $director)
    {
        if (!empty($director)) {
            $query->whereHas('directors', function ($query) use ($director) {
                $query->whereIn('director_id', $director);
            });
        }

        return $query;
    }
    public static function filterByActors($query, $actors)
    {
        if (!empty($actors)) {
            $query->whereHas('actors', function ($query) use ($actors) {
                $query->whereIn('actor_id', $actors);
            });
        }

        return $query;
    }
    public static function filterByYears($query, $years)
    {
        if (!empty($years)) {
            $query->where('year', $years);
        }

        return $query;
    }
}
