<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminSettingInterface;
use App\Http\Requests\Admin\Setting\CreateSettingRequest;
use App\Http\Requests\Admin\Setting\DeleteSettingRequest;
use App\Http\Requests\Admin\Setting\UpdateSettingRequest;
use Illuminate\Http\Request;

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

    public function delete(DeleteSettingRequest $request)
    {
        return $this->settingInterface->delete($request);
    }

    public function update(UpdateSettingRequest $request)
    {
        return $this->settingInterface->update($request);
    }
}
