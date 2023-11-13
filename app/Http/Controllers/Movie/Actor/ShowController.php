<?php

namespace App\Http\Controllers\Movie\Actor;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Actor $actor)
    {
        return view('actor.show', compact('actor'));
    }
}
