<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminPreventionDescriptionInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\PreventionDescription\PreventionDescriptionTrait;
use App\Models\PreventionDescription;

class AdminPreventionDescriptionRepository implements AdminPreventionDescriptionInterface
{
    private $preventionDescriptionModel;
    use ApiResponseTrait, PreventionDescriptionTrait;
    public function __construct(PreventionDescription $preventionDescription)
    {
        $this->preventionDescriptionModel = $preventionDescription;
    }

    public function index()
    {
        $preventionDescriptions = $this->getPreventionDescriptions();
        return $this->apiResponse(200, 'Prevention Descriptions Data', null, $preventionDescriptions);
    }

    public function create($request)
    {
        $preventionDescription = $this->preventionDescriptionModel::create([
            'description' => $request->description,
            'prevention_id' => $request->prevention_id
        ]);
        return $this->apiResponse(200, 'Prevention Description Was Created', null, $preventionDescription);
    }

    public function delete($request)
    {
        $this->findPreventionDescription($request->id)->delete();
        return $this->apiResponse(200, 'Prevention Description Was Deleted');
    }

    public function update($request)
    {
        $this->findPreventionDescription($request->id)->update([
            'description' => $request->description,
            'prevention_id' => $request->prevention_id
        ]);
        return $this->apiResponse(200, 'Prevention Description Was Updated');
    }
}
