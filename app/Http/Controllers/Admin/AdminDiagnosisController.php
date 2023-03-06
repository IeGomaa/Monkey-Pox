<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminDiagnosisInterface;
use App\Http\Requests\Admin\Diagnosis\DeleteDiagnosisRequest;
use App\Http\Services\Diagnosis\DiagnosisDeleteImageService;

class AdminDiagnosisController extends Controller
{
    private $diagnosisInterface;
    public function __construct(AdminDiagnosisInterface $interface)
    {
        $this->diagnosisInterface = $interface;
    }

    public function index()
    {
        return $this->diagnosisInterface->index();
    }

    public function delete(DeleteDiagnosisRequest $request, DiagnosisDeleteImageService $service)
    {
        return $this->diagnosisInterface->delete($request, $service);
    }
}
