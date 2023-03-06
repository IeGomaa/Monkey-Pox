<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminClinicDetailInterface;
use App\Http\Requests\Admin\ClinicDetail\CreateClinicDetailRequest;
use App\Http\Requests\Admin\ClinicDetail\DeleteClinicDetailRequest;
use App\Http\Requests\Admin\ClinicDetail\UpdateClinicDetailRequest;

class AdminClinicDetailController extends Controller
{
    private $clinicDetailInterface;
    public function __construct(AdminClinicDetailInterface $interface)
    {
        $this->clinicDetailInterface = $interface;
    }

    public function index()
    {
        return $this->clinicDetailInterface->index();
    }

    public function create(CreateClinicDetailRequest $request)
    {
        return $this->clinicDetailInterface->create($request);
    }

    public function delete(DeleteClinicDetailRequest $request)
    {
        return $this->clinicDetailInterface->delete($request);
    }

    public function update(UpdateClinicDetailRequest $request)
    {
        return $this->clinicDetailInterface->update($request);
    }
}
