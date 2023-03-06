<?php

namespace App\Http\Traits\Redis;

use App\Http\Traits\History\HistoryTrait;
use Illuminate\Support\Facades\Redis;

trait HistoryRedis
{
    use HistoryTrait;
    private function setHistoriesIntoRedis()
    {
        $redis = Redis::connection();
        $redis->set('histories', $this->getHistories());
    }

    private function getHistoriesFromRedis()
    {
        $redis = Redis::connection();
        $data = json_decode($redis->get('histories'));
        if (empty($data)) {
            $data = $this->getHistories();
        }
        return $data;
    }
}
