<?php

namespace App\Http\Traits\VaccineInformation;

trait VaccineInformationTrait
{
    private function getVaccineInformation()
    {
        return $this->vaccineInformationModel::with('vaccine')->get();
    }

    private function findVaccineInformation($id)
    {
        return $this->vaccineInformationModel::with('vaccine')->find($id);
    }
}
