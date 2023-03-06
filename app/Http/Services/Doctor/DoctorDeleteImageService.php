<?php

namespace App\Http\Services\Doctor;

class DoctorDeleteImageService
{
    public function deleteImageInLocal($image)
    {
        unlink(public_path($image));
    }
}
