<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminClinicPhoneInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\ClinicPhone\ClinicPhoneTrait;
use App\Models\ClinicPhone;

class AdminClinicPhoneRepository implements AdminClinicPhoneInterface
{
    private $clinicPhoneModel;
    use ApiResponseTrait, ClinicPhoneTrait;
    public function __construct(ClinicPhone $clinicPhone)
    {
        $this->clinicPhoneModel = $clinicPhone;
    }

    public function index()
    {
        $clinicPhones = $this->getClinicPhones();
        return $this->apiResponse(200, 'Clinic Phones Data', null, $clinicPhones);
    }

    public function create($request)
    {
        $clinicPhone = $this->clinicPhoneModel::create([
            'phone' => $request->phone,
            'clinic_id' => $request->clinic_id
        ]);
        return $this->apiResponse(200, 'Clinic Phone Was Created', null, $clinicPhone);
    }

    public function delete($request)
    {
        $this->findClinicPhone($request->id)->delete();
        return $this->apiResponse(200, 'Clinic Phone Was Deleted');
    }

    public function update($request)
    {
        $this->findClinicPhone($request->id)->update([
            'phone' => $request->phone,
            'clinic_id' => $request->clinic_id
        ]);
        return $this->apiResponse(200, 'Clinic Phone Was Updated');
    }
}
