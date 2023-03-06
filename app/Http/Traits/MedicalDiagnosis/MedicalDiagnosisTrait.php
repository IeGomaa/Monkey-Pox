<?php

namespace App\Http\Traits\MedicalDiagnosis;

trait MedicalDiagnosisTrait
{
    private function getMedicalDiagnoses()
    {
        return $this->medicalDiagnosisModel::get();
    }

    private function findMedicalDiagnosis($medicalDiagnosis_id)
    {
        return $this->medicalDiagnosisModel::find($medicalDiagnosis_id);
    }
}
