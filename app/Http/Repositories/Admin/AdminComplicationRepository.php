<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminComplicationInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Complication\ComplicationTrait;
use App\Http\Traits\Redis\ComplicationRedis;
use App\Models\Complication;

class AdminComplicationRepository implements AdminComplicationInterface
{
    private $complicationModel;
    use ApiResponseTrait, ComplicationRedis;
    public function __construct(Complication $complication)
    {
        $this->complicationModel = $complication;
    }

    public function index()
    {
        $complications = $this->getComplicationFromRedis();
        return $this->apiResponse(200, 'Complication Data', null, $complications);
    }

    public function create($request)
    {
        $complication = $this->complicationModel::create([
            'item' => $request->item
        ]);
        $this->setComplicationIntoRedis();
        return $this->apiResponse(200, 'Complication Was Created', null, $complication);
    }

    public function delete($request)
    {
        $this->findComplication($request->id)->delete();
        $this->setComplicationIntoRedis();
        return $this->apiResponse(200, 'Complication Was Deleted');
    }

    public function update($request)
    {
        $this->findComplication($request->id)->update([
            'item' => $request->item
        ]);
        $this->setComplicationIntoRedis();
        return $this->apiResponse(200, 'Complication Was Updated');
    }
}
