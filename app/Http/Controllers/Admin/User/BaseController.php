<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Services\Admin\User\UserService;

class baseController extends Controller
{
    public $servive;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }
}
