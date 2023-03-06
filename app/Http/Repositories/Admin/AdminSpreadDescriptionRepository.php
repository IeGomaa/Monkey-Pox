<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminSpreadDescriptionInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Redis\SpreadRedis;
use App\Http\Traits\SpreadDescription\SpreadDescriptionTrait;
use App\Models\SpreadDescription;

class AdminSpreadDescriptionRepository implements AdminSpreadDescriptionInterface
{
    private $spreadDescriptionModel;
    use ApiResponseTrait, SpreadDescriptionTrait, SpreadRedis;
    public function __construct(SpreadDescription $spreadDescription)
    {
        $this->spreadDescriptionModel = $spreadDescription;
    }

    public function index()
    {
        $spreadDescriptions = $this->getSpreadDescriptions();
        $filterd = [];
        foreach ($spreadDescriptions as $spreadDescription) {
            $filterd []= collect($spreadDescription)->only(['id', 'spread', 'description']);
        }
        return $this->apiResponse(200, 'Spread Descriptions Data', null, $filterd);
    }

    public function create($request)
    {
        $spreadDescription = $this->spreadDescriptionModel::create([
            'description' => $request->description,
            'spread_id' => $request->spread_id
        ]);
        return $this->apiResponse(200, 'Spread Description Was Created', null, $spreadDescription);
    }

    public function delete($request)
    {
        $this->findSpreadDescription($request->id)->delete();
        return $this->apiResponse(200, 'Spread Description Was Deleted');
    }

    public function update($request)
    {
        $this->findSpreadDescription($request->id)->update([
            'description' => $request->description,
            'spread_id' => $request->spread_id
        ]);
        return $this->apiResponse(200, 'Spread Description Was update');
    }
}
