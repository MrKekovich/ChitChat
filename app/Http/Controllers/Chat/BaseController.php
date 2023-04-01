<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Service\Chat\Service;

class BaseController extends Controller
{
    public Service $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
