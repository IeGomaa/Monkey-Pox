<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\DiagnosisInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Diagnosis\DiagnosisTrait;
use App\Models\Diagnosis;
use App\Models\MedicalDiagnosis;
use Illuminate\Support\Facades\Auth;

class DiagnosisRepository implements DiagnosisInterface
{
    private $diagnosisModel;
    use ApiResponseTrait, DiagnosisTrait;
    public function __construct(Diagnosis $diagnosis)
    {
        $this->diagnosisModel = $diagnosis;
    }

    public function create($request, $service)
    {
        $imageName = $service->uploadImage($request->image);
        $diagnosis = $this->diagnosisModel::create([
            'image' => $imageName,
            'patient_id' => auth('patient')->user()->id
        ]);
        return $this->apiResponse(200,'Diagnose Was Created', null, $diagnosis);
    }

    public function result()
    {
        $medicalDiagnosis = MedicalDiagnosis::select('degree')->find(Auth::guard('patient')->user()->id);
        return $this->apiResponse(200, 'Radiography Degree', null, $medicalDiagnosis);
    }
}
