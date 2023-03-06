<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminSliderInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Redis\SliderRedis;
use App\Models\Slider;

class AdminSliderRepository implements AdminSliderInterface
{
    private $sliderModel;
    use ApiResponseTrait, SliderRedis;
    public function __construct(Slider $slider)
    {
        $this->sliderModel = $slider;
    }

    public function index()
    {
        $sliders = $this->getSlidersFromRedis();
        return $this->apiResponse(200, 'Sliders Data', null, $sliders);
    }

    public function create($request, $service)
    {
        $imageName = $service->uploadImage($request->image);
        $slider = $this->sliderModel::create([
            'image' => $imageName
        ]);
        $this->setSlidersIntoRedis();
        return $this->apiResponse(200, 'Slider Was Created', null, $slider);
    }

    public function delete($request, $service)
    {
        $slider = $this->findSlider($request->id);
        $service->deleteImageInLocal($slider->image);
        $slider->delete();
        $this->setSlidersIntoRedis();
        return $this->apiResponse(200, 'Slider Was Deleted');
    }

    public function update($request, $service)
    {
        $slider = $this->findSlider($request->id);
        $imageName = $service->uploadImage($request->image, $slider->image);
        $slider->update([
            'image' => $imageName
        ]);
        $this->setSlidersIntoRedis();
        return $this->apiResponse(200, 'Slider Was Updated');
    }
}
