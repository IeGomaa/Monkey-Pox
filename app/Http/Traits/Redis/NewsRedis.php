<?php

namespace App\Http\Traits\Redis;

use App\Http\Traits\News\NewsTrait;
use Illuminate\Support\Facades\Redis;

trait NewsRedis
{
    use NewsTrait;
    private function setNewsIntoRedis()
    {
        $redis = Redis::connection();
        $redis->set('news', $this->getNews());
    }

    private function getNewsFromRedis()
    {
        $redis = Redis::connection();
        $data = json_decode($redis->get('news'));
        if (empty($data)) {
            $data = $this->getNews();
        }
        return $data;
    }
}
