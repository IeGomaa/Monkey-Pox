<?php

namespace App\Http\Services\Setting;

class SettingCheckImageService
{
    public function checkSettingImageExistsOrNot($image): bool
    {
        return file_exists(public_path('uploaded/setting/' . $image));
    }
}
