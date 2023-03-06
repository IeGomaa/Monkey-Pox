<?php

namespace App\Http\Services\News;

class NewsUploadImageService
{
    public function uploadImage($file, $oldImage = null): string
    {
        $fileName = time() . '_news.' . $file->extension();

        if (!is_null($oldImage)) {
            unlink(public_path($oldImage));
        }
        $file->move(public_path('uploaded/news'), $fileName);
        return $fileName;
    }
}
