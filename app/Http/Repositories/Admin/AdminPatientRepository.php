<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminPatientInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Patient;

class AdminPatientRepository implements AdminPatientInterface
{
    private $patientModel;
    use ApiResponseTrait;
    public function __construct(Patient $patient)
    {
        $this->patientModel = $patient;
    }

    public function index()
    {
        $patients = $this->patientModel::get();
        return $this->apiResponse(200, 'Patients Data', null, $patients);
    }

    public function delete($request)
    {
        $this->patientModel::find($request->id)->delete();
        return $this->apiResponse(200, 'Patient Was Deleted');
    }
}
