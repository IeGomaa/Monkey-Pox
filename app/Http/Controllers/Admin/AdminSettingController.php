<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminSettingInterface;
use App\Http\Requests\Admin\Setting\CreateSettingRequest;
use App\Http\Requests\Admin\Setting\DeleteSettingRequest;
use App\Http\Requests\Admin\Setting\UpdateSettingRequest;
use App\Http\Services\Setting\SettingDeleteImageService;

class AdminSettingController extends Controller
{
    private $settingInterface;
    public function __construct(AdminSettingInterface $interface)
    {
        $this->settingInterface = $interface;
    }

    public function index()
    {
        return $this->settingInterface->index();
    }

    public function create(CreateSettingRequest $request)
    {
        return $this->settingInterface->create($request);
    }

    public function delete(DeleteSettingRequest $request, SettingDeleteImageService $service)
    {
        return $this->settingInterface->delete($request, $service);
    }

    public function update(UpdateSettingRequest $request)
    {
        return $this->settingInterface->update($request);
    }
}
