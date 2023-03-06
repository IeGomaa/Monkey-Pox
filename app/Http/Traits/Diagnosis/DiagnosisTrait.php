<?php

namespace App\Http\Traits\Diagnosis;

trait DiagnosisTrait
{
    private function getDiagnoses()
    {
        return $this->diagnosisModel::get();
    }

    private function findDiagnosis($id)
    {
        return $this->diagnosisModel::find($id);
    }
}
