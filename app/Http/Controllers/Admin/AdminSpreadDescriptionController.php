<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminSpreadDescriptionInterface;
use App\Http\Requests\Admin\SpreadDescription\CreateSpreadDescriptionRequest;
use App\Http\Requests\Admin\SpreadDescription\DeleteSpreadDescriptionRequest;
use App\Http\Requests\Admin\SpreadDescription\UpdateSpreadDescriptionRequest;

class AdminSpreadDescriptionController extends Controller
{
    private $spreadDescriptionInterface;
    public function __construct(AdminSpreadDescriptionInterface $interface)
    {
        $this->spreadDescriptionInterface = $interface;
    }

    public function index()
    {
        return $this->spreadDescriptionInterface->index();
    }

    public function create(CreateSpreadDescriptionRequest $request)
    {
        return $this->spreadDescriptionInterface->create($request);
    }

    public function delete(DeleteSpreadDescriptionRequest $request)
    {
        return $this->spreadDescriptionInterface->delete($request);
    }

    public function update(UpdateSpreadDescriptionRequest $request)
    {
        return $this->spreadDescriptionInterface->update($request);
    }
}
