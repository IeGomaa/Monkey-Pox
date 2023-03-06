<?php

namespace App\Http\Interfaces\Admin;

interface AdminPatientInterface
{
    public function index();
    public function delete($request);
}
