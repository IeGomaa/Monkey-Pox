<?php

namespace App\Http\Traits\Country;

trait CountryTrait
{
    private function getCountries()
    {
        return $this->countryModel::get();
    }

    private function findCountry($id)
    {
        return $this->countryModel::find($id);
    }
}
