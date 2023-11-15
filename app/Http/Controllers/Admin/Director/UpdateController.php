<?php

namespace App\Http\Controllers\Admin\Director;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Director\UpdateRequest;
use App\Models\Director;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Director $director)
    {
        $data = $request->validated();
        $data['image'] = Storage::disk('public')->put('/images', $data['image']);
        $director->update($data);
        return view('admin.director.show', compact('director'));
    }
}
