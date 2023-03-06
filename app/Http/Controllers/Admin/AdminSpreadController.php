<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminSpreadInterface;
use App\Http\Requests\Admin\Spread\CreateSpreadRequest;
use App\Http\Requests\Admin\Spread\DeleteSpreadRequest;
use App\Http\Requests\Admin\Spread\UpdateSpreadRequest;

class AdminSpreadController extends Controller
{
    private $spreadInterface;
    public function __construct(AdminSpreadInterface $interface)
    {
        $this->spreadInterface = $interface;
    }

    public function index()
    {
        return $this->spreadInterface->index();
    }

    public function create(CreateSpreadRequest $request)
    {
        return $this->spreadInterface->create($request);
    }

    public function delete(DeleteSpreadRequest $request)
    {
        return $this->spreadInterface->delete($request);
    }

    public function update(UpdateSpreadRequest $request)
    {
        return $this->spreadInterface->update($request);
    }
}
