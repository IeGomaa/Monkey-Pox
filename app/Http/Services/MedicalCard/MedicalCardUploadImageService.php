<?php

namespace App\Http\Services\MedicalCard;

class MedicalCardUploadImageService
{
    public function uploadImage($file, $oldImage = null): string
    {
        $fileName = time() . '_card.' . $file->extension();
        if (!is_null($oldImage)) {
            unlink(public_path($oldImage));
        }
        $file->move(public_path('uploaded/doctor/card'), $fileName);
        return $fileName;
    }
}
