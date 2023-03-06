<?php

namespace App\Http\Controllers\Ai;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Ai\PatientRadiographyInterface;
use App\Http\Requests\Ai\GetResultOfRadiography;
use App\Http\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class PatientRadiographyController extends Controller
{
    private $aiInterface;
    use ApiResponseTrait;
    public function __construct(PatientRadiographyInterface $interface)
    {
        $this->aiInterface = $interface;
    }

    public function sendToAi()
    {
        return $this->aiInterface->sendToAi();
    }

    public function getResultFromAi(GetResultOfRadiography $request)
    {
        return $this->aiInterface->getResultFromAi($request);
    }
}
