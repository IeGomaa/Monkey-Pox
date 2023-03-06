<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminPreventionInterface;
use App\Http\Requests\Admin\Prevention\CreatePreventionRequest;
use App\Http\Requests\Admin\Prevention\DeletePreventionRequest;
use App\Http\Requests\Admin\Prevention\UpdatePreventionRequest;

class AdminPreventionController extends Controller
{
    private $preventionInterface;
    public function __construct(AdminPreventionInterface $interface)
    {
        $this->preventionInterface = $interface;
    }

    public function index()
    {
        return $this->preventionInterface->index();
    }

    public function create(CreatePreventionRequest $request)
    {
        return $this->preventionInterface->create($request);
    }

    public function delete(deletePreventionRequest $request)
    {
        return $this->preventionInterface->delete($request);
    }

    public function update(updatePreventionRequest $request)
    {
        return $this->preventionInterface->update($request);
    }
}
