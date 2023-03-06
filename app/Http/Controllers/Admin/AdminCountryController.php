<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminCountryInterface;
use App\Http\Requests\Admin\Country\CreateCountryRequest;
use App\Http\Requests\Admin\Country\DeleteCountryRequest;
use App\Http\Requests\Admin\Country\UpdateCountryRequest;

class AdminCountryController extends Controller
{
    private $countryInterface;
    public function __construct(AdminCountryInterface $interface)
    {
        $this->countryInterface = $interface;
    }

    public function index()
    {
        return $this->countryInterface->index();
    }

    public function create(CreateCountryRequest $request)
    {
        return $this->countryInterface->create($request);
    }

    public function delete(DeleteCountryRequest $request)
    {
        return $this->countryInterface->delete($request);
    }

    public function update(UpdateCountryRequest $request)
    {
        return $this->countryInterface->update($request);
    }
}
