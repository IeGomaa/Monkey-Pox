<?php

namespace App\Http\Interfaces\Admin;

interface AdminDoctorInterface
{
    public function index();
    public function create($request, $service, $medicalUploadService);
    public function delete($request, $service);
    public function update($request, $service);
}
