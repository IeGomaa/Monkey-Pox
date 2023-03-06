<?php

namespace Tests\Unit\Services\Slider;

use App\Http\Services\Slider\SliderDeleteImageService;
use Illuminate\Http\Testing\File;
use Tests\TestCase;

class SliderDeleteImageTest extends TestCase
{
    const PATH = 'uploaded/slider/';
    public function test_slider_delete_image_in_public_path()
    {
        $image = File::fake()->create('slider')->move(public_path(self::PATH));
        $service = $this->app->make(SliderDeleteImageService::class);
        $service->deleteImageInLocal(self::PATH . $image->getFilename());
        $this->assertFileDoesNotExist(public_path(self::PATH . $image->getFilename()));
    }
}
