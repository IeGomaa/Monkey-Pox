<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminMedicalDiagnosisInterface;
use App\Http\Requests\Admin\MedicalDiagonsis\DeleteMedicalDiagnosisRequest;

class AdminMedicalDiagnosisController extends Controller
{
    private $medicalDiagnosisInterface;
    public function __construct(AdminMedicalDiagnosisInterface $interface)
    {
        $this->medicalDiagnosisInterface = $interface;
    }

    public function index()
    {
        return $this->medicalDiagnosisInterface->index();
    }

    public function delete(DeleteMedicalDiagnosisRequest $request)
    {
        return $this->medicalDiagnosisInterface->delete($request);
    }
}
