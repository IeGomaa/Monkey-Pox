<?php

namespace App\Http\Traits\Redis;

use App\Http\Traits\Complication\ComplicationTrait;
use Illuminate\Support\Facades\Redis;

trait ComplicationRedis
{
    use ComplicationTrait;
    private function setComplicationIntoRedis()
    {
        $redis = Redis::connection();
        $redis->set('complications', $this->getComplications());
    }
    private function getComplicationFromRedis()
    {
        $redis = Redis::connection();
        $data = json_decode($redis->get('complications'));
        if (empty($data)) {
            $data = $this->getComplications();
        }
        return $data;
    }
}
