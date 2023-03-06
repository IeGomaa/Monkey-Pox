<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminPreventionInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Prevention\PreventionTrait;
use App\Models\Prevention;

class AdminPreventionRepository implements AdminPreventionInterface
{
    use ApiResponseTrait, PreventionTrait;
    private $preventionModel;
    public function __construct(Prevention $prevention)
    {
        $this->preventionModel = $prevention;
    }

    public function index()
    {
        $prevention = $this->getPreventions();
        return $this->apiResponse(200, 'Prevention Data', null, $prevention);
    }

    public function create($request)
    {
        $prevention = $this->preventionModel::create([
            'title' => $request->title
        ]);
        return $this->apiResponse(200, 'Prevention Was Created', null, $prevention);
    }

    public function delete($request)
    {
        $prevention = $this->findPrevention($request->id);
        $prevention->delete();
        return $this->apiResponse(200, 'Prevention Was Deleted');
    }

    public function update($request)
    {
        $prevention = $this->findPrevention($request->id);
        $prevention->update([
            'title' => $request->title
        ]);
        return $this->apiResponse(200, 'Prevention Was Updated');
    }
}
