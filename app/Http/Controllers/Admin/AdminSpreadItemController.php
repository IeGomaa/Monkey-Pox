<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminSpreadItemInterface;
use App\Http\Requests\Admin\SpreadItem\CreateSpreadItemRequest;
use App\Http\Requests\Admin\SpreadItem\DeleteSpreadItemRequest;
use App\Http\Requests\Admin\SpreadItem\UpdateSpreadItemRequest;

class AdminSpreadItemController extends Controller
{
    private $spreadItemInterface;
    public function __construct(AdminSpreadItemInterface $interface)
    {
        $this->spreadItemInterface = $interface;
    }

    public function index()
    {
        return $this->spreadItemInterface->index();
    }

    public function create(CreateSpreadItemRequest $request)
    {
        return $this->spreadItemInterface->create($request);
    }

    public function delete(DeleteSpreadItemRequest $request)
    {
        return $this->spreadItemInterface->delete($request);
    }

    public function update(UpdateSpreadItemRequest $request)
    {
        return $this->spreadItemInterface->update($request);
    }
}
