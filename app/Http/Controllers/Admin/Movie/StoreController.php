<?php

namespace App\Http\Controllers\Admin\Movie;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Movie\StoreRequest;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends BaseController
{

    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
//        $data['image'] = Storage::disk('public')->put('/images', $data['image']);
//        $post = Movie::firstOrCreate($data);
        return redirect()->route('admin.movie.index');
    }
}
