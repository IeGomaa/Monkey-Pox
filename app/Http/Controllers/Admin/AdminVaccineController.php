<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminVaccineInterface;
use App\Http\Requests\Admin\Vaccine\CreateVaccineRequest;
use App\Http\Requests\Admin\Vaccine\DeleteVaccineRequest;
use App\Http\Requests\Admin\Vaccine\UpdateVaccineRequest;
use Illuminate\Http\Request;

class AdminVaccineController extends Controller
{
    private $vaccineInterface;
    public function __construct(AdminVaccineInterface $interface)
    {
        $this->vaccineInterface = $interface;
    }

    public function index()
    {
        return $this->vaccineInterface->index();
    }

    public function create(CreateVaccineRequest $request)
    {
        return $this->vaccineInterface->create($request);
    }

    public function delete(DeleteVaccineRequest $request)
    {
        return $this->vaccineInterface->delete($request);
    }

    public function update(UpdateVaccineRequest $request)
    {
        return $this->vaccineInterface->update($request);
    }
}
