<?php

namespace Tests\Unit\Services\Doctor;

use App\Http\Services\Doctor\DoctorDeleteImageService;
use Illuminate\Http\Testing\File;
use Tests\TestCase;

class DoctorDeleteImageTest extends TestCase
{
    const PATH = 'uploaded/doctor/';
    public function test_doctor_delete_image_in_public_path()
    {
        $image = File::fake()->create('doctor')->move(public_path(self::PATH));
        $service = $this->app->make(DoctorDeleteImageService::class);
        $service->deleteImageInLocal(self::PATH . $image->getFilename());
        $this->assertFileDoesNotExist(public_path(self::PATH . $image->getFilename()));
    }
}
