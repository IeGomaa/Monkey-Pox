<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminClinicInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Clinic\ClinicTrait;
use App\Models\Clinic;

class AdminClinicRepository implements AdminClinicInterface
{
    private $clinicModel;
    use ApiResponseTrait, ClinicTrait;
    public function __construct(Clinic $clinic)
    {
        $this->clinicModel = $clinic;
    }

    public function index()
    {
        $clinics = $this->getClinics();
        return $this->apiResponse(200, 'Clinics Data', null, $clinics);
    }

    public function create($request)
    {
        $clinic = $this->clinicModel::create([
            'location' => $request->location,
            'doctor_id' => $request->doctor_id,
            'town_id' => $request->town_id
        ]);
        return $this->apiResponse(200, 'Clinic Was Created', null, $clinic);
    }

    public function delete($request)
    {
        $this->findClinic($request->id)->delete();
        return $this->apiResponse(200, 'Clinic Was Deleted');
    }

    public function update($request)
    {
        $this->findClinic($request->id)->update([
            'location' => $request->location,
            'doctor_id' => $request->doctor_id,
            'town_id' => $request->town_id
        ]);
        return $this->apiResponse(200, 'Clinic Was Updated');
    }
}
