<?php

namespace App\Http\Controllers\Admin\Director;

use App\Http\Controllers\Controller;
use App\Models\Director;
use App\Models\Movie;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Director $director)
    {
        return view('admin.director.edit', compact('director'));
    }
}
