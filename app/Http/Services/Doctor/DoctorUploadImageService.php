<?php

namespace App\Http\Services\Doctor;

class DoctorUploadImageService
{
    public function uploadImage($file, $oldImage = null): string
    {
        $fileName = time() . '_doctor.' . $file->extension();
        if (!is_null($oldImage)) {
            (!file_exists(public_path($oldImage))) ?: unlink(public_path($oldImage));
        }
        $file->move(public_path('uploaded/doctor/avatar'), $fileName);
        return $fileName;
    }
}
