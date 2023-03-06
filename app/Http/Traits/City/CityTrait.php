<?php

namespace App\Http\Traits\City;

trait CityTrait
{
    private function getCities()
    {
        return $this->cityModel::with('country')->get();
    }

    private function findCity($id)
    {
        return $this->cityModel::with('country')->find($id);
    }
}
