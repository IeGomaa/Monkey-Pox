<?php

namespace App\Http\Traits\Symptom;

trait SymptomTrait
{
    private function getSymptoms()
    {
        return $this->symptomModel::get();
    }

    private function findSymptom($id)
    {
        return $this->symptomModel::find($id);
    }
}
