<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\SettingInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Redis\SettingRedis;
use App\Models\Setting;

class SettingRepository implements SettingInterface
{
    use ApiResponseTrait, SettingRedis;
    private $settingModel;
    public function __construct(Setting $setting)
    {
        $this->settingModel = $setting;
    }

    public function index()
    {
        $settings = $this->getSettingsFromRedis();
        return $this->apiResponse(200,'Setting Data', null, $settings);
    }
}
