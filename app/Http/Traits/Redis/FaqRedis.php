<?php

namespace App\Http\Traits\Redis;

use App\Http\Traits\Faq\FaqTrait;
use Illuminate\Support\Facades\Redis;

trait FaqRedis
{
    use FaqTrait;
    private function setFaqsIntoRedis()
    {
        $redis = Redis::connection();
        $redis->set('faqs', $this->getFaqs());
    }

    private function getFaqsFromRedis()
    {
        $redis = Redis::connection();
        $data = json_decode($redis->get('faqs'));
        if (empty($data)) {
            $data = $this->getFaqs();
        }
        return $data;
    }
}
