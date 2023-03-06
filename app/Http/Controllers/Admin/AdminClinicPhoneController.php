<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminClinicPhoneInterface;
use App\Http\Requests\Admin\ClinicPhone\CreateClinicPhoneRequest;
use App\Http\Requests\Admin\ClinicPhone\DeleteClinicPhoneRequest;
use App\Http\Requests\Admin\ClinicPhone\UpdateClinicPhoneRequest;

class AdminClinicPhoneController extends Controller
{
    private $clinicPhoneInterface;
    public function __construct(AdminClinicPhoneInterface $interface)
    {
        $this->clinicPhoneInterface = $interface;
    }

    public function index()
    {
        return $this->clinicPhoneInterface->index();
    }

    public function create(CreateClinicPhoneRequest $request)
    {
        return $this->clinicPhoneInterface->create($request);
    }

    public function delete(DeleteClinicPhoneRequest $request)
    {
        return $this->clinicPhoneInterface->delete($request);
    }

    public function update(UpdateClinicPhoneRequest $request)
    {
        return $this->clinicPhoneInterface->update($request);
    }
}
