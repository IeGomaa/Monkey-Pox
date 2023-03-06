<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminComplicationInterface;
use App\Http\Requests\Admin\Complication\CreateComplicationRequest;
use App\Http\Requests\Admin\Complication\DeleteComplicationRequest;
use App\Http\Requests\Admin\Complication\UpdateComplicationRequest;
use Illuminate\Http\Request;

class AdminComplicationController extends Controller
{
    private $complicationInterface;
    public function __construct(AdminComplicationInterface $interface)
    {
        $this->complicationInterface = $interface;
    }

    public function index()
    {
        return $this->complicationInterface->index();
    }

    public function create(CreateComplicationRequest $request)
    {
        return $this->complicationInterface->create($request);
    }

    public function delete(DeleteComplicationRequest $request)
    {
        return $this->complicationInterface->delete($request);
    }

    public function update(UpdateComplicationRequest $request)
    {
        return $this->complicationInterface->update($request);
    }
}
