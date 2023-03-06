<?php

namespace App\Http\Interfaces\Admin;

interface AdminDiagnosisInterface
{
    public function index();
    public function delete($request, $service);
}
