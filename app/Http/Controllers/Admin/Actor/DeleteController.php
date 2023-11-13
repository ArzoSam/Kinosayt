<?php

namespace App\Http\Controllers\Admin\Actor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Director\StoreRequest;
use App\Models\Actor;
use App\Models\Director;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller
{

    public function __invoke(Actor $actor)
    {
        $actor->delete();
        return redirect()->route('admin.actor.index');

    }
}
