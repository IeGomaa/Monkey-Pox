<?php

namespace App\Http\Traits\Redis;

use App\Models\Prevention;
use Illuminate\Support\Facades\Redis;

trait PreventionRedis
{
    private function setPreventionIntoRedis()
    {
        $redis = Redis::connection();
        $data = Prevention::with(['preventionDescription'])->get();
        $redis->set('preventions', $data);
    }

    private function getPreventionFromRedis()
    {
        $redis = Redis::connection();
        $data = json_decode($redis->get('preventions'));
        if (empty($data)) {
            $data = Prevention::with(['preventionDescription'])->get();
        }
        return $data;
    }
}
