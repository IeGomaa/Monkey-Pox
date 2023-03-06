<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminSliderInterface;
use App\Http\Requests\Admin\Slider\CreateSliderRequest;
use App\Http\Requests\Admin\Slider\DeleteSliderRequest;
use App\Http\Requests\Admin\Slider\UpdateSliderRequest;
use App\Http\Services\Slider\SliderDeleteImageService;
use App\Http\Services\Slider\SliderUploadImageService;

class AdminSliderController extends Controller
{
    private $sliderInterface;
    public function __construct(AdminSliderInterface $interface)
    {
        $this->sliderInterface = $interface;
    }

    public function index()
    {
        return $this->sliderInterface->index();
    }

    public function create(CreateSliderRequest $request, SliderUploadImageService $service)
    {
        return $this->sliderInterface->create($request, $service);
    }

    public function delete(DeleteSliderRequest $request, SliderDeleteImageService $service)
    {
        return $this->sliderInterface->delete($request, $service);
    }

    public function update(UpdateSliderRequest $request, SliderUploadImageService $service)
    {
        return $this->sliderInterface->update($request, $service);
    }
}
