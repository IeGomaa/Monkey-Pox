<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminVaccineInformationInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\VaccineInformation\VaccineInformationTrait;
use App\Models\VaccineInformation;

class AdminVaccineInformationRepository implements AdminVaccineInformationInterface
{
    private $vaccineInformationModel;
    use ApiResponseTrait, VaccineInformationTrait;
    public function __construct(VaccineInformation $vaccineInformation)
    {
        $this->vaccineInformationModel = $vaccineInformation;
    }
    public function index()
    {
        $vaccineInformation = $this->getVaccineInformation();
        return $this->apiResponse(200, 'Vaccine Information Data', null, $vaccineInformation);
    }

    public function create($request)
    {
        $vaccineInformation = $this->vaccineInformationModel::create([
            'description' => $request->description,
            'vaccine_id' => $request->vaccine_id
        ]);
        return $this->apiResponse(200, 'Vaccine Information Was Created', null, $vaccineInformation);
    }

    public function delete($request)
    {
        $this->findVaccineInformation($request->id)->delete();
        return $this->apiResponse(200, 'Vaccine Information Was Deleted');
    }

    public function update($request)
    {
        $this->findVaccineInformation($request->id)->update([
            'description' => $request->description,
            'vaccine_id' => $request->vaccine_id
        ]);
        return $this->apiResponse(200, 'Vaccine Information Was Updated');
    }
}
