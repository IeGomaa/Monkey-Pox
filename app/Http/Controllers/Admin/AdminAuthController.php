<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminAuthInterface;
use App\Http\Requests\Admin\Auth\LoginRequest;

class AdminAuthController extends Controller
{
    private $authInterface;
    public function __construct(AdminAuthInterface $interface)
    {
        $this->authInterface = $interface;
    }

    public function login(LoginRequest $request)
    {
        return $this->authInterface->login($request);
    }

    public function logout()
    {
        return $this->authInterface->logout();
    }
}
