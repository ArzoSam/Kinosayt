<?php

namespace App\Http\Controllers\Movie\Director;

use App\Http\Controllers\Controller;
use App\Models\Director;
use App\Models\Movie;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Director $director)
    {
        return view('director.show', compact('director'));
    }
}
