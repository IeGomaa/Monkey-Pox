<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminCityInterface;
use App\Http\Requests\Admin\City\CreateCityRequest;
use App\Http\Requests\Admin\City\DeleteCityRequest;
use App\Http\Requests\Admin\City\UpdateCityRequest;

class AdminCityController extends Controller
{
    private $cityInterface;
    public function __construct(AdminCityInterface $interface)
    {
        $this->cityInterface = $interface;
    }

    public function index()
    {
        return $this->cityInterface->index();
    }

    public function create(CreateCityRequest $request)
    {
        return $this->cityInterface->create($request);
    }

    public function delete(DeleteCityRequest $request)
    {
        return $this->cityInterface->delete($request);
    }

    public function update(UpdateCityRequest $request)
    {
        return $this->cityInterface->update($request);
    }
}
