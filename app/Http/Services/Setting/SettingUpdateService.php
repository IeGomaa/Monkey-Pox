<?php

namespace App\Http\Services\Setting;

class SettingUpdateService
{
    private $service;
    private $checkImage;
    public function __construct(SettingUploadImageService $service, SettingCheckImageService $checkImage)
    {
        $this->service = $service;
        $this->checkImage = $checkImage;
    }

    public function checkSettingUpdateTypeIsStringOrImage($type, $setting)
    {
        if ($type == 'string') {
            return request('string');
        } else {
            if ($this->checkImage->checkSettingImageExistsOrNot($setting->value)) {
                return $this->service->uploadImage(request('image'), 'uploaded/setting/' . $setting->value);
            } else {
                return $this->service->uploadImage(request('image'));
            }
        }
    }
}
