<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminTownInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Town\TownTrait;
use App\Models\Town;

class AdminTownRepository implements AdminTownInterface
{
    private $townModel;
    use ApiResponseTrait, TownTrait;
    public function __construct(Town $town)
    {
        $this->townModel = $town;
    }
    public function index()
    {
        $towns = $this->getTowns();
        return $this->apiResponse(200, 'Towns Data', null, $towns);
    }

    public function create($request)
    {
        $town = $this->townModel::create([
            'name' => $request->name,
            'city_id' => $request->city_id
        ]);
        return $this->apiResponse(200, 'Town Was Created', null, $town);
    }

    public function delete($request)
    {
        $this->findTown($request->id)->delete();
        return $this->apiResponse(200, 'Town Was Deleted');
    }

    public function update($request)
    {
        $this->findTown($request->id)->update([
            'name' => $request->name,
            'city_id' => $request->city_id
        ]);
        return $this->apiResponse(200, 'Town Was Updated');
    }
}
