<?php

namespace App\Http\Services\Diagnosis;

class DiagnosisDeleteImageService
{
    public function deleteImageInLocal($image)
    {
        unlink(public_path($image));
    }
}
