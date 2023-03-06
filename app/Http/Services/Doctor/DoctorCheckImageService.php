<?php

namespace App\Http\Services\Doctor;

class DoctorCheckImageService
{
    private $service;
    public function __construct(DoctorUploadImageService $service)
    {
        $this->service = $service;
    }

    public function checkImage($image, $doctor): string
    {
        if (!is_null($image)) {
            $imageName = $this->service->uploadImage($image, $doctor->image);
        } else {
            $imageName = $doctor->getRawOriginal('image');
        }
        return $imageName;
    }
}
