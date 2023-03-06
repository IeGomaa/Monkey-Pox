<?php

namespace Tests\Unit\Services\News;

use App\Http\Services\News\NewsUploadImageService;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class NewsUploadImageTest extends TestCase
{
    public function test_news_upload_image()
    {
        $image = UploadedFile::fake()->image('news.png');
        $service = $this->app->make(NewsUploadImageService::class);
        $imageName = $service->uploadImage($image);
        $this->assertFileExists(public_path('uploaded/news/'. $imageName));
    }
}
