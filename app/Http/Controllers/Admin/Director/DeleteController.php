<?php

namespace App\Http\Controllers\Admin\Director;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Director\StoreRequest;
use App\Models\Director;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller
{

    public function __invoke(Director $director)
    {
        $director->delete();
        return redirect()->route('admin.director.index');

    }
}
