<?php

namespace App\Http\Interfaces\EndUser;

interface DiagnosisInterface
{
    public function create($request, $service);
    public function result();
}
