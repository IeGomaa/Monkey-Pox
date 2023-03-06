<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminPreventionDescriptionInterface;
use App\Http\Requests\Admin\PreventionDescription\CreatePreventionDescriptionRequest;
use App\Http\Requests\Admin\PreventionDescription\DeletePreventionDescriptionRequest;
use App\Http\Requests\Admin\PreventionDescription\UpdatePreventionDescriptionRequest;

class AdminPreventionDescriptionController extends Controller
{
    private $preventionDescriptionInterface;
    public function __construct(AdminPreventionDescriptionInterface $interface)
    {
        $this->preventionDescriptionInterface = $interface;
    }

    public function index()
    {
        return $this->preventionDescriptionInterface->index();
    }

    public function create(CreatePreventionDescriptionRequest $request)
    {
        return $this->preventionDescriptionInterface->create($request);
    }

    public function delete(deletePreventionDescriptionRequest $request)
    {
        return $this->preventionDescriptionInterface->delete($request);
    }

    public function update(updatePreventionDescriptionRequest $request)
    {
        return $this->preventionDescriptionInterface->update($request);
    }
}
