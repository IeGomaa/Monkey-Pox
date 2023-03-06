<?php

namespace App\Http\Repositories\Ai;

use App\Http\Interfaces\Ai\PatientRadiographyInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Diagnosis;
use App\Models\MedicalDiagnosis;

class PatientRadiographyRepository implements PatientRadiographyInterface
{
    use ApiResponseTrait;
    public function sendToAi()
    {
        $radiography = Diagnosis::select('image')->find(auth('patient')->user()->id);
        return $this->apiResponse(200, 'Patient Radiography', null, $radiography);
    }

    public function getResultFromAi($request)
    {
        $result = MedicalDiagnosis::create([
            'degree' => $request->degree,
            'patient_id' => auth('patient')->user()->id
        ]);
        return $this->apiResponse(200, 'The Result', null, $result);
    }
}
