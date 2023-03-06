<?php

namespace App\Http\Interfaces\Admin;

interface AdminAuthInterface
{
    public function login($request);
    public function logout();
}
