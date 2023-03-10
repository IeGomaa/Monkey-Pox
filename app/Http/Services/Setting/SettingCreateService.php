<?php

namespace App\Http\Services\Setting;

class SettingCreateService
{
    private $service;
    public function __construct(SettingUploadImageService $service)
    {
        $this->service = $service;
    }

    public function checkSettingCreateIsStringOrImage($type)
    {
        return ($type == 'string') ? request('string') : $this->service->uploadImage(request('image'));
    }
}
