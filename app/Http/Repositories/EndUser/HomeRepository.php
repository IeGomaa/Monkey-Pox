<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\HomeInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Redis\SliderRedis;
use App\Models\Slider;

class HomeRepository implements HomeInterface
{
    private $sliderModel;
    use ApiResponseTrait, SliderRedis;
    public function __construct(Slider $slider)
    {
        $this->sliderModel = $slider;
    }
    public function index()
    {
        $data = $this->getSlidersFromRedis();
        return $this->apiResponse(200, 'Home Data', null, $data);
    }
}
