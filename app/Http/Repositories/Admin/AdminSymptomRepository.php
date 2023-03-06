<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminSymptomInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Symptom\SymptomTrait;
use App\Models\Symptom;

class AdminSymptomRepository implements AdminSymptomInterface
{
    use ApiResponseTrait, SymptomTrait;
    private $symptomModel;
    public function __construct(Symptom $symptom)
    {
        $this->symptomModel = $symptom;
    }

    public function index()
    {
        $symptom = $this->getSymptoms();
        return $this->apiResponse(200, 'Symptom Data', null, $symptom);
    }

    public function create($request)
    {
        $symptom = $this->symptomModel::create([
            'symptom' => $request->symptom
        ]);
        return $this->apiResponse(200, 'Symptom Was Created', null, $symptom);
    }

    public function delete($request)
    {
        $symptom = $this->findSymptom($request->id);
        $symptom->delete();
        return $this->apiResponse(200, 'Symptom Was Deleted');
    }

    public function update($request)
    {
        $symptom = $this->findSymptom($request->id);
        $symptom->update([
            'symptom' => $request->symptom
        ]);
        return $this->apiResponse(200, 'Symptom Was Updated');
    }
}
