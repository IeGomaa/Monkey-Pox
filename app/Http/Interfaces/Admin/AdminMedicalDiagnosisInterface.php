<?php

namespace App\Http\Interfaces\Admin;

interface AdminMedicalDiagnosisInterface
{
    public function index();
    public function delete($request);
}
