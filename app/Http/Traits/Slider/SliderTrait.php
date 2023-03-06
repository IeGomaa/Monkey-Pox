<?php

namespace App\Http\Traits\Slider;

trait SliderTrait
{
    private function getSliders()
    {
        return $this->sliderModel::get();
    }

    private function findSlider($id)
    {
        return $this->sliderModel::find($id);
    }
}
