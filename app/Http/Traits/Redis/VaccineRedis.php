<?php

namespace App\Http\Traits\Redis;

use App\Http\Traits\Vaccine\VaccineTrait;
use Illuminate\Support\Facades\Redis;

trait VaccineRedis
{
    use VaccineTrait;
    private function setVaccineIntoRedis()
    {
        $redis = Redis::connection();
        $redis->set('vaccines', $this->getVaccines());
    }

    private function getVaccineFromRedis()
    {
        $redis = Redis::connection();
        $data = json_decode($redis->get('vaccines'));
        if (empty($data)) {
            $data = $this->getVaccines();
        }
        return $data;
    }
}
