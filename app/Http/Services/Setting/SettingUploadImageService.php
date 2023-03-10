<?php

namespace App\Http\Services\Setting;

class SettingUploadImageService
{
    public function uploadImage($file, $oldImage = null): string
    {
        $fileName = time() . '_setting.' . $file->extension();

        if (!is_null($oldImage)) {
            unlink(public_path($oldImage));
        }
        $file->move(public_path('uploaded/setting'), $fileName);
        return $fileName;
    }
}
