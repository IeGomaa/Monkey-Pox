<?php

namespace App\Http\Traits\Redis;

use App\Models\Spread;
use Illuminate\Support\Facades\Redis;

trait SpreadRedis
{
    private function setSpreadIntoRedis()
    {
        $redis = Redis::connection();
        $data = Spread::with(['spreadDescription', 'spreadDescription.items'])->get();
        $redis->set('spreads', $data);
    }

    private function getSpreadFromRedis()
    {
        $redis = Redis::connection();
        $data = json_decode($redis->get('spreads'));
        if (empty($data)) {
            $data = Spread::with(['spreadDescription', 'spreadDescription.items'])->get();
        }
        return $data;
    }
}
