<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\PreventionInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Redis\PreventionRedis;

class PreventionRepository implements PreventionInterface
{
    use ApiResponseTrait, PreventionRedis;

    public function index()
    {
        $preventions = $this->getPreventionFromRedis();
        return $this->apiResponse(200, 'Preventions Data', null, $preventions);
    }
}
