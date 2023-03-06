<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\AboutInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Redis\ComplicationRedis;
use App\Http\Traits\Redis\SpreadRedis;
use App\Http\Traits\Redis\SymptomRedis;
use App\Http\Traits\Redis\VaccineRedis;
use App\Models\Complication;
use App\Models\Spread;
use App\Models\Symptom;
use App\Models\Vaccine;

class AboutRepository implements AboutInterface
{
    private $complicationModel, $vaccineModel, $symptomModel, $spreadModel;
    use ApiResponseTrait, ComplicationRedis, VaccineRedis, SymptomRedis, SpreadRedis;
    public function __construct(Complication $complication, Vaccine $vaccine, Symptom $symptom, Spread $spread)
    {
        $this->spreadModel = $spread;
        $this->complicationModel = $complication;
        $this->symptomModel = $symptom;
        $this->vaccineModel = $vaccine;
    }

    public function index()
    {
        $data = [
            'spreads' => $this->getSpreadFromRedis(),
            'complications' => $this->getComplicationFromRedis(),
            'symptoms' => $this->getSymptomFromRedis(),
            'vaccines' => $this->getVaccineFromRedis()
        ];
        return $this->apiResponse(200, 'About Data', null, $data);
    }
}
