<?php

namespace App\Http\Controllers\Admin\Director;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Director\StoreRequest;
use App\Models\Director;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShowController extends Controller
{

    public function __invoke(Director $director)
    {
        return view('admin.director.show', compact('director'));
    }
}
