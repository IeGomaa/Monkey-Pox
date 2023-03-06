<?php

namespace Tests\Unit\Services\Doctor;

use App\Http\Services\Doctor\DoctorUploadImageService;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class DoctorUploadImageTest extends TestCase
{
    public function test_doctor_upload_image()
    {
        $image = UploadedFile::fake()->image('doctor.png');
        $service = $this->app->make(DoctorUploadImageService::class);
        $imageName = $service->uploadImage($image);
        $this->assertFileExists(public_path('uploaded/doctor/'. $imageName));
    }
}
