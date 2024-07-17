<?php

namespace App\Http\Controllers\API;

use App\Helpers\SetResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\BookingRequest;
use App\Http\Resources\API\ServiceResourceApi;
use App\Models\Service;
use App\Models\ServiceBooking;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct(public SetResponse $setResponse)
    {

    }
    public function index()
    {
        $services = Service::get(['id','name']);
        if($services->count() > 0)
            return $this->setResponse->MakeResponse(ServiceResourceApi::collection($services),'success message',true,200);
        return $this->setResponse->MakeResponse([],'data not found',false,404);
    }
    public function booking(BookingRequest $request)
    {
        $data = ServiceBooking::create($request->validated());
        return $this->setResponse->MakeResponse([],'success message',true,200);
    }
}
