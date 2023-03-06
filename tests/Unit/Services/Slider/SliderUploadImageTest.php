<?php

namespace Tests\Unit\Services\Slider;

use App\Http\Services\Slider\SliderUploadImageService;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class SliderUploadImageTest extends TestCase
{
    public function test_slider_upload_image()
    {
        $image = UploadedFile::fake()->image('slider.png');
        $service = $this->app->make(SliderUploadImageService::class);
        $imageName = $service->uploadImage($image);
        $this->assertFileExists(public_path('uploaded/slider/'. $imageName));
    }
}
