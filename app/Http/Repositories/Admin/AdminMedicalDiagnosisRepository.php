<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminMedicalDiagnosisInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\MedicalDiagnosis\MedicalDiagnosisTrait;
use App\Models\MedicalDiagnosis;

class AdminMedicalDiagnosisRepository implements AdminMedicalDiagnosisInterface
{
    private $medicalDiagnosisModel;
    use ApiResponseTrait, MedicalDiagnosisTrait;
    public function __construct(MedicalDiagnosis $medicalDiagnosis)
    {
        $this->medicalDiagnosisModel = $medicalDiagnosis;
    }

    public function index()
    {
        return $this->apiResponse(200, 'Medical Diagnoses Data', null, $this->getMedicalDiagnoses());
    }

    public function delete($request)
    {
        $this->findMedicalDiagnosis($request->id)->delete();
        return $this->apiResponse(200, 'Medical Diagnosis Was Deleted Successfully');
    }
}
