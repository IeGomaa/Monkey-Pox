<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminAwardInterface;
use App\Http\Requests\Admin\Award\CreateAwardRequest;
use App\Http\Requests\Admin\Award\DeleteAwardRequest;
use App\Http\Requests\Admin\Award\UpdateAwardRequest;

class AdminAwardController extends Controller
{
    private $awardInterface;
    public function __construct(AdminAwardInterface $interface)
    {
        $this->awardInterface = $interface;
    }

    public function index()
    {
        return $this->awardInterface->index();
    }

    public function create(CreateAwardRequest $request)
    {
        return $this->awardInterface->create($request);
    }

    public function delete(DeleteAwardRequest $request)
    {
        return $this->awardInterface->delete($request);
    }

    public function update(UpdateAwardRequest $request)
    {
        return $this->awardInterface->update($request);
    }
}
