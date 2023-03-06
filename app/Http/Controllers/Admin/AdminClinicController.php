<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminClinicInterface;
use App\Http\Requests\Admin\Clinic\CreateClinicRequest;
use App\Http\Requests\Admin\Clinic\DeleteClinicRequest;
use App\Http\Requests\Admin\Clinic\UpdateClinicRequest;
use Illuminate\Http\Request;

class AdminClinicController extends Controller
{
    private $clinicInterface;
    public function __construct(AdminClinicInterface $interface)
    {
        $this->clinicInterface = $interface;
    }

    public function index()
    {
        return $this->clinicInterface->index();
    }

    public function create(CreateClinicRequest $request)
    {
        return $this->clinicInterface->create($request);
    }

    public function delete(DeleteClinicRequest $request)
    {
        return $this->clinicInterface->delete($request);
    }

    public function update(UpdateClinicRequest $request)
    {
        return $this->clinicInterface->update($request);
    }
}
