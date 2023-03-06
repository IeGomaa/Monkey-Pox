<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminVaccineInformationInterface;
use App\Http\Requests\Admin\VaccineInformation\CreateVaccineInformationRequest;
use App\Http\Requests\Admin\VaccineInformation\DeleteVaccineInformationRequest;
use App\Http\Requests\Admin\VaccineInformation\UpdateVaccineInformationRequest;
use Illuminate\Http\Request;

class AdminVaccineInformationController extends Controller
{
    private $vaccineInformationInterface;
    public function __construct(AdminVaccineInformationInterface $interface)
    {
        $this->vaccineInformationInterface = $interface;
    }

    public function index()
    {
        return $this->vaccineInformationInterface->index();
    }

    public function create(CreateVaccineInformationRequest $request)
    {
        return $this->vaccineInformationInterface->create($request);
    }

    public function delete(DeleteVaccineInformationRequest $request)
    {
        return $this->vaccineInformationInterface->delete($request);
    }

    public function update(UpdateVaccineInformationRequest $request)
    {
        return $this->vaccineInformationInterface->update($request);
    }
}
