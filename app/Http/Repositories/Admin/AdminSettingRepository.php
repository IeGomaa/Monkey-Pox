<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminSettingInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Redis\SettingRedis;
use App\Models\Setting;

class AdminSettingRepository implements AdminSettingInterface
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
        return $this->apiResponse(200, 'Setting Data', null, $settings);
    }

    public function create($request)
    {
        $setting = $this->settingModel::create([
            'name' => $request->name,
            'value' => $request->value
        ]);
        $this->setSettingsIntoRedis();
        return $this->apiResponse(200, 'Setting Was Created', null, $setting);
    }

    public function delete($request)
    {
        $this->findSetting($request->id)->delete();
        $this->setSettingsIntoRedis();
        return $this->apiResponse(200, 'Setting Was Deleted');
    }

    public function update($request)
    {
        $this->findSetting($request->id)->update([
            'name' => $request->name,
            'value' => $request->value
        ]);
        $this->setSettingsIntoRedis();
        return $this->apiResponse(200, 'Setting Was Updated');
    }
}
