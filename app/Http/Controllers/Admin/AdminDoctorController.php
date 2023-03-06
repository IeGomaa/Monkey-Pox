<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminDoctorInterface;
use App\Http\Requests\Admin\Doctor\CreateDoctorRequest;
use App\Http\Requests\Admin\Doctor\DeleteDoctorRequest;
use App\Http\Requests\Admin\Doctor\UpdateDoctorRequest;
use App\Http\Services\Doctor\DoctorCheckImageService;
use App\Http\Services\Doctor\DoctorDeleteImageService;
use App\Http\Services\Doctor\DoctorUploadImageService;
use App\Http\Services\MedicalCard\MedicalCardDeleteImageService;
use App\Http\Services\MedicalCard\MedicalCardUploadImageService;
use Illuminate\Http\Request;

class AdminDoctorController extends Controller
{
    private $doctorInterface;
    public function __construct(AdminDoctorInterface $interface)
    {
        $this->doctorInterface = $interface;
    }

    public function index()
    {
        return $this->doctorInterface->index();
    }

    public function create(CreateDoctorRequest $request, DoctorUploadImageService $service, MedicalCardUploadImageService $medicalUploadService)
    {
        return $this->doctorInterface->create($request, $service, $medicalUploadService);
    }

    public function delete(DeleteDoctorRequest $request, DoctorDeleteImageService $service)
    {
        return $this->doctorInterface->delete($request, $service);
    }

    public function update(UpdateDoctorRequest $request, DoctorCheckImageService $service)
    {
        return $this->doctorInterface->update($request, $service);
    }
}
