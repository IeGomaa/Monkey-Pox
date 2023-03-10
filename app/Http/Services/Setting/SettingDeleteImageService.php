<?php

namespace App\Http\Services\Setting;

class SettingDeleteImageService
{
    public function deleteImageInLocal($image)
    {
        unlink(public_path($image));
    }
}
