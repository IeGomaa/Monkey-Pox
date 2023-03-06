<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminCityInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\City\CityTrait;
use App\Models\City;

class AdminCityRepository implements AdminCityInterface
{
    private $cityModel;
    use ApiResponseTrait, CityTrait;
    public function __construct(City $city)
    {
        $this->cityModel = $city;
    }

    public function index()
    {
        $cities = $this->getCities();
        return $this->apiResponse(200, 'Cities Data', null, $cities);
    }

    public function create($request)
    {
        $city = $this->cityModel::create([
            'name' => $request->name,
            'country_id' => $request->country_id
        ]);
        return $this->apiResponse(200, 'City Was Created', null, $city);
    }

    public function delete($request)
    {
        $this->findCity($request->id)->delete();
        return $this->apiResponse(200, 'City Was Deleted');
    }

    public function update($request)
    {
        $this->findCity($request->id)->update([
            'name' => $request->name,
            'country_id' => $request->country_id
        ]);
        return $this->apiResponse(200, 'City Was Updated');
    }
}
