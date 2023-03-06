<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\SettingInterface;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    private $settingInterface;
    public function __construct(SettingInterface $interface)
    {
        $this->settingInterface = $interface;
    }

    public function index()
    {
        return $this->settingInterface->index();
    }
}
