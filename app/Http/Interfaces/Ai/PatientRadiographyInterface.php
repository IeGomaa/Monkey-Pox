<?php

namespace App\Http\Interfaces\Ai;

interface PatientRadiographyInterface
{
    public function sendToAi();
    public function getResultFromAi($request);
}
