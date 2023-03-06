<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminSpreadInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Spread\SpreadTrait;
use App\Models\Spread;

class AdminSpreadRepository implements AdminSpreadInterface
{
    private $spreadModel;
    use ApiResponseTrait, SpreadTrait;
    public function __construct(Spread $spread)
    {
        $this->spreadModel = $spread;
    }

    public function index()
    {
        $spreads = $this->getSpreads();
        return $this->apiResponse(200, 'Spreads Data', null, $spreads);
    }

    public function create($request)
    {
        $spread = $this->spreadModel::create([
            'title' => $request->title
        ]);
        return $this->apiResponse(200, 'Spread Was Created', null, $spread);
    }

    public function delete($request)
    {
        $this->findSpread($request->id)->delete();
        return $this->apiResponse(200, 'Spread Was Deleted');
    }

    public function update($request)
    {
        $this->findSpread($request->id)->update([
            'title' => $request->title
        ]);
        return $this->apiResponse(200, 'Spread Was Updated');
    }
}
