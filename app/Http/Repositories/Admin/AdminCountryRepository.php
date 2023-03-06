<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminCountryInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Country\CountryTrait;
use App\Models\Country;

class AdminCountryRepository implements AdminCountryInterface
{
    use ApiResponseTrait, CountryTrait;
    private $countryModel;

    public function __construct(Country $country)
    {
        $this->countryModel = $country;
    }

    public function index()
    {
        $country = $this->getCountries();
        return $this->apiResponse(200, 'Country Data', null, $country);
    }

    public function create($request)
    {
        $country = $this->countryModel::create([
            'name' => $request->name
        ]);
        return $this->apiResponse(200, 'Country Was Created', null, $country);
    }

    public function delete($request)
    {
        $country = $this->findCountry($request->id);
        $country->delete();
        return $this->apiResponse(200, 'Country Was Deleted');
    }

    public function update($request)
    {
        $country = $this->findCountry($request->id);
        $country->update([
            'name' => $request->name
        ]);
        return $this->apiResponse(200, 'Country Was Updated');
    }
}
