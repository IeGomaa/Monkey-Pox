<?php

namespace App\Http\Traits\Doctor;

trait DoctorTrait
{
    private function getDoctors()
    {
        return $this->doctorModel::with('town')->get();
    }

    private function findDoctors($id)
    {
        return $this->doctorModel::with('town')->find($id);
    }
}
