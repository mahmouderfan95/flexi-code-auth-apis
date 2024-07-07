<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Services\Service as ServicesService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct(public ServicesService $servicesService){}
    public function index()
    {
        return $this->servicesService->index();
    }
}
