<?php

namespace Tests\Unit\Services\News;

use App\Http\Services\News\NewsDeleteImageService;
use Illuminate\Http\Testing\File;
use Tests\TestCase;

class NewsDeleteImageTest extends TestCase
{
    const PATH = 'uploaded/news/';
    public function test_news_delete_image_in_public_path()
    {
        $image = File::fake()->create('news')->move(public_path(self::PATH));
        $service = $this->app->make(NewsDeleteImageService::class);
        $service->deleteImageInLocal(self::PATH . $image->getFilename());
        $this->assertFileDoesNotExist(public_path(self::PATH . $image->getFilename()));
    }
}
