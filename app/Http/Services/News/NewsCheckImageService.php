<?php

namespace App\Http\Services\News;
class NewsCheckImageService
{
    private $service;
    public function __construct(NewsUploadImageService $service)
    {
        $this->service = $service;
    }

    public function checkImage($image, $news)
    {
        if (!is_null($image)) {
            $imageName = $this->service->uploadImage($image, $news->image);
        } else {
            $imageName = $news->getRawOriginal('image');
        }
        return $imageName;
    }
}
