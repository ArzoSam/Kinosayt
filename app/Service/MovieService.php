<?php


namespace App\Service;


use App\Models\Movie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MovieService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $actorIds = $data['actor_ids'];
            unset($data['actor_ids']);
            $genreIds = $data['genre_ids'];
            unset($data['genre_ids']);
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            $movie = Movie::firstOrCreate($data);
            $movie->actors()->attach($actorIds);
            $movie->genres()->attach($genreIds);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $movie)
    {
        try {
            DB::beginTransaction();
            if(isset($data['actor_ids'])) {
                $actorIds = $data['actor_ids'];
                unset($data['actor_ids']);
            }
            if(isset($data['genre_ids'])) {
                $genreIds = $data['genre_ids'];
                unset($data['genre_ids']);
            }
            if(isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            }
            $movie->update($data);
            if(isset($actorIds)) {
                $movie->actors()->sync($actorIds);
            }
            if(isset($genreIds)) {
                $movie->genres()->sync($genreIds);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return $movie;
    }
}
