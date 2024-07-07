<?php
namespace App\Services;

use App\Helpers\SetResponse;
use App\Http\Resources\Api\ServiceResource;
use App\Models\Service as ServiceModel;
class Service
{
    public function __construct(public SetResponse $setResponse){}
    public function index()
    {
        $services = ServiceModel::get(['id','name']);
        if($services->count() > 0)
            return $this->setResponse->MakeResponse(ServiceResource::collection($services),'success message',true,200);
        return $this->setResponse->MakeResponse([],'data not found',false,404);
    }
}
