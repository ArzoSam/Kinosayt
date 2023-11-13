<?php

namespace App\Http\Controllers\Admin\Director;

use App\Http\Controllers\Controller;
use App\Models\Director;
use App\Models\Movie;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $directors = Director::all();
        return view('admin.director.index', compact('directors'));
    }
}
