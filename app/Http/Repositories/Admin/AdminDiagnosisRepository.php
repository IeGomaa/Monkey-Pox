<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminDiagnosisInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Diagnosis\DiagnosisTrait;
use App\Models\Diagnosis;

class AdminDiagnosisRepository implements AdminDiagnosisInterface
{
    private $diagnosisModel;
    use ApiResponseTrait, DiagnosisTrait;
    public function __construct(Diagnosis $diagnosis)
    {
        $this->diagnosisModel = $diagnosis;
    }

    public function index()
    {
        $diagnoses = $this->getDiagnoses();
        return $this->apiResponse(200, 'Diagnoses Data', null, $diagnoses);
    }

    public function delete($request, $service)
    {
        $diagnosis = $this->findDiagnosis($request->id);
        $service->deleteImageInLocal($diagnosis->image);
        $diagnosis->delete();
        return $this->apiResponse(200, 'Diagnosis Was Deleted');
    }
}
