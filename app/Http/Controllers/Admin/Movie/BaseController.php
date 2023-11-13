<?php

namespace App\Http\Controllers\Admin\Movie;

use App\Http\Controllers\Controller;
use App\Service\MovieService;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $service;

    public function __construct(MovieService $service)
    {
        $this->service = $service;
    }


}
