<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\DoctorInterface;
use App\Http\Requests\Admin\Doctor\CreateDoctorRequest;
use App\Http\Requests\EndUser\ApplyDoctorRequest;
use App\Http\Services\Doctor\DoctorUploadImageService;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    private $doctorInterface;
    public function __construct(DoctorInterface $interface)
    {
        $this->doctorInterface = $interface;
    }

    public function index()
    {
        return $this->doctorInterface->index();
    }

    public function find($id)
    {
        return $this->doctorInterface->find($id);
    }

    public function apply(ApplyDoctorRequest $request, DoctorUploadImageService $service)
    {
        return $this->doctorInterface->apply($request, $service);
    }
}
