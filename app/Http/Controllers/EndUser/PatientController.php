<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUser\PatientInterface;
use App\Http\Requests\EndUser\Patient\LoginPatientRequest;
use App\Http\Requests\EndUser\Patient\RegisterPatientRequest;
use App\Http\Traits\ApiResponseTrait;

class PatientController extends Controller
{
    private $patientInterface;
    use ApiResponseTrait;
    public function __construct(PatientInterface $interface)
    {
        $this->patientInterface = $interface;
    }

    public function register(RegisterPatientRequest $request)
    {
        return $this->patientInterface->register($request);
    }

    public function login(LoginPatientRequest $request)
    {
        return $this->patientInterface->login($request);
    }

    public function logout()
    {
        return $this->patientInterface->logout();
    }
}
