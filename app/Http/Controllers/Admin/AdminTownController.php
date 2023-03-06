<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminTownInterface;
use App\Http\Requests\Admin\Town\CreateTownRequest;
use App\Http\Requests\Admin\Town\DeleteTownRequest;
use App\Http\Requests\Admin\Town\UpdateTownRequest;

class AdminTownController extends Controller
{
    private $townInterface;
    public function __construct(AdminTownInterface $interface)
    {
        $this->townInterface = $interface;
    }

    public function index()
    {
        return $this->townInterface->index();
    }

    public function create(CreateTownRequest $request)
    {
        return $this->townInterface->create($request);
    }

    public function delete(DeleteTownRequest $request)
    {
        return $this->townInterface->delete($request);
    }

    public function update(UpdateTownRequest $request)
    {
        return $this->townInterface->update($request);
    }
}
