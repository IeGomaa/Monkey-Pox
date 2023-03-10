<?php

namespace App\Http\Interfaces\Admin;

interface AdminSettingInterface
{
    public function index();
    public function create($request);
    public function delete($request, $service);
    public function update($request);
}
