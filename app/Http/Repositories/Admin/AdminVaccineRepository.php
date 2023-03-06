<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminVaccineInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Redis\VaccineRedis;
use App\Http\Traits\Vaccine\VaccineTrait;
use App\Models\Vaccine;

class AdminVaccineRepository implements AdminVaccineInterface
{
    private $vaccineModel;
    use ApiResponseTrait, VaccineRedis, VaccineTrait;
    public function __construct(Vaccine $vaccine)
    {
        $this->vaccineModel = $vaccine;
    }

    public function index()
    {
        $vaccines = $this->getVaccines();
        return $this->apiResponse(200, 'Vaccines Data', null, $vaccines);
    }

    public function create($request)
    {
        $vaccine = $this->vaccineModel::create([
            'vaccine' => $request->vaccine
        ]);
        return $this->apiResponse(200, 'Vaccine Was Created', null, $vaccine);
    }

    public function delete($request)
    {
        $this->findVaccine($request->id)->delete();
        return $this->apiResponse(200, 'Vaccine Was Deleted');
    }

    public function update($request)
    {
        $this->findVaccine($request->id)->update([
            'vaccine' => $request->vaccine
        ]);
        return $this->apiResponse(200, 'Vaccine Was Updated');
    }
}
