<?php

namespace App\Http\Traits\Redis;

use App\Http\Traits\Slider\SliderTrait;
use Illuminate\Support\Facades\Redis;

trait SliderRedis
{
    use SliderTrait;

    private function setSlidersIntoRedis()
    {
        $redis = Redis::connection();
        $redis->set('sliders', $this->getSliders());
    }

    private function getSlidersFromRedis()
    {
        $redis = Redis::connection();
        $data = json_decode($redis->get('sliders'));
        if (empty($data)) {
            $data = $this->getSliders();
        }
        return $data;
    }
}
