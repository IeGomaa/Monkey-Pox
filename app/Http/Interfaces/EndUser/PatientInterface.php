<?php

namespace App\Http\Interfaces\EndUser;

interface PatientInterface
{
    public function register($request);
    public function login($request);
    public function logout();
}
