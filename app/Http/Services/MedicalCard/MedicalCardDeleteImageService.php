<?php

namespace App\Http\Services\MedicalCard;

class MedicalCardDeleteImageService
{
    public function deleteImageInLocal($image)
    {
        unlink(public_path($image));
    }
}
