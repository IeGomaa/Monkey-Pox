<?php

namespace App\Http\Traits\Redis;

use App\Http\Traits\Symptom\SymptomTrait;
use Illuminate\Support\Facades\Redis;

trait SymptomRedis
{
    use SymptomTrait;
    private function setSymptomIntoRedis()
    {
        $redis = Redis::connection();
        $redis->set('symptoms', $this->getSymptoms());
    }

    private function getSymptomFromRedis()
    {
        $redis = Redis::connection();
        $data = json_decode($redis->get('symptoms'));
        if (empty($data)) {
            $data = $this->getSymptoms();
        }
        return $data;
    }
}
