<?php

namespace App\Http\Services\Diagnosis;

class DiagnosisUploadImageService
{
    public function uploadImage($file, $oldImage = null): string
    {
        $fileName = time() . '_diagnosis.' . $file->extension();

        if (!is_null($oldImage)) {
            unlink(public_path($oldImage));
        }
        $file->move(public_path('uploaded/diagnosis'), $fileName);
        return $fileName;
    }
}
