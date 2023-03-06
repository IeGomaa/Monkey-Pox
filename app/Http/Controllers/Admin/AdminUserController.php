<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminUserInterface;
use App\Http\Requests\Admin\User\CreateUserRequest;
use App\Http\Requests\Admin\User\DeleteUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;

class AdminUserController extends Controller
{
    private $userInterface;
    public function __construct(AdminUserInterface $interface)
    {
        $this->userInterface = $interface;
    }

    public function index()
    {
        return $this->userInterface->index();
    }

    public function account()
    {
        return $this->userInterface->account();
    }

    public function create(CreateUserRequest $request)
    {
        return $this->userInterface->create($request);
    }

    public function delete(DeleteUserRequest $request)
    {
        return $this->userInterface->delete($request);
    }

    public function update(UpdateUserRequest $request)
    {
        return $this->userInterface->update($request);
    }
}
