<?php

namespace App\Http\Traits\Clinic;

trait ClinicTrait
{
    private function getClinics()
    {
        return $this->clinicModel::with(['doctor'])->get();
    }

    private function findClinic($id)
    {
        return $this->clinicModel::with(['doctor'])->find($id);
    }
}
