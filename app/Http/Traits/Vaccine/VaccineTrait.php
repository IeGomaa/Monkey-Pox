<?php

namespace App\Http\Traits\Vaccine;

trait VaccineTrait
{
    private function getVaccines()
    {
        return $this->vaccineModel::with('vaccineInformation')->get();
    }

    private function findVaccine($id)
    {
        return $this->vaccineModel::find($id);
    }
}
