<?php

namespace App\Http\Controllers\Admin\Movie;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Movie\UpdateRequest;
use App\Models\Movie;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Movie $movie)
    {
        $data = $request->validated();
        $this->service->update($data,$movie);

        return view('admin.movie.show' , compact('movie'));
    }
}
