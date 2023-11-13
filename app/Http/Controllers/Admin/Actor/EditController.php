<?php

namespace App\Http\Controllers\Admin\Actor;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use App\Models\Director;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Actor $actor)
    {
        return view('admin.actor.edit', compact('actor'));
    }
}
