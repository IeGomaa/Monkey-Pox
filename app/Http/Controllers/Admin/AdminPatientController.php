<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminPatientInterface;
use App\Http\Requests\Admin\Patient\DeletePatientRequest;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminPatientController extends Controller
{
    private $patientInterface;
    public function __construct(AdminPatientInterface $interface)
    {
        $this->patientInterface = $interface;
    }

    public function index()
    {
        return $this->patientInterface->index();
    }

    public function delete(DeletePatientRequest $request)
    {
        return $this->patientInterface->delete($request);
    }
}
