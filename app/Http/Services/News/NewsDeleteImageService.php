<?php

namespace App\Http\Services\News;

class NewsDeleteImageService
{
    public function deleteImageInLocal($image)
    {
        unlink(public_path($image));
    }
}
