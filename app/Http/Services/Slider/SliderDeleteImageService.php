<?php

namespace App\Http\Services\Slider;

class SliderDeleteImageService
{
    public function deleteImageInLocal($image)
    {
        unlink(public_path($image));
    }
}
