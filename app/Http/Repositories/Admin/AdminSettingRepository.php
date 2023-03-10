<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminSettingInterface;
use App\Http\Services\Setting\SettingCheckImageService;
use App\Http\Services\Setting\SettingCreateService;
use App\Http\Services\Setting\SettingUpdateService;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Redis\SettingRedis;
use App\Models\Setting;

class AdminSettingRepository implements AdminSettingInterface
{
    const PATH = 'uploaded/setting/';
    use ApiResponseTrait, SettingRedis;
    private $settingModel;
    private $checkImage;
    private $createService;
    private $updateService;
    public function __construct(Setting $setting, SettingCheckImageService $service, SettingCreateService $createService, SettingUpdateService $updateService)
    {
        $this->settingModel = $setting;
        $this->checkImage = $service;
        $this->createService = $createService;
        $this->updateService = $updateService;
    }

    public function index()
    {
        $settings = $this->getSettingsFromRedis();
        return $this->apiResponse(200, 'Setting Data', null, $settings);
    }

    public function create($request)
    {
        $value = $this->createService->checkSettingCreateIsStringOrImage($request->type);
        $setting = $this->settingModel::create([
            'name' => $request->name,
            'value' => $value
        ]);
        $this->setSettingsIntoRedis();
        return $this->apiResponse(200, 'Setting Was Created', null, $setting);
    }

    public function delete($request, $service)
    {
        $setting = $this->findSetting($request->id);
        (! $this->checkImage->checkSettingImageExistsOrNot($setting->value) ) ?: $service->deleteImageInLocal(self::PATH . $setting->value);
        $setting->delete();
        $this->setSettingsIntoRedis();
        return $this->apiResponse(200, 'Setting Was Deleted');
    }

    public function update($request)
    {
        $setting = $this->findSetting($request->id);
        $value = $this->updateService->checkSettingUpdateTypeIsStringOrImage($request->type, $setting);
        $setting->update([
            'name' => $request->name,
            'value' => $value
        ]);
        $this->setSettingsIntoRedis();
        return $this->apiResponse(200, 'Setting Was Updated');
    }
}
