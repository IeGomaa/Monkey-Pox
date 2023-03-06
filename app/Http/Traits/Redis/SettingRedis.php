<?php

namespace App\Http\Traits\Redis;

use App\Http\Traits\Setting\SettingTrait;
use Illuminate\Support\Facades\Redis;

trait SettingRedis
{
    use SettingTrait;
    private function setSettingsIntoRedis()
    {
        $redis = Redis::connection();
        $redis->set('settings', $this->getSettings());
    }

    private function getSettingsFromRedis()
    {
        $redis = Redis::connection();
        $data = json_decode($redis->get('settings'));
        if (empty($data)) {
            $data = $this->getSettings();
        }
        return $data;
    }
}
