<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminSpreadItemInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Redis\SpreadRedis;
use App\Http\Traits\SpreadItem\SpreadItemTrait;
use App\Models\SpreadItem;

class AdminSpreadItemRepository implements AdminSpreadItemInterface
{
    private $spreadItemModel;
    use ApiResponseTrait, SpreadItemTrait, SpreadRedis;
    public function __construct(SpreadItem $spreadItem)
    {
        $this->spreadItemModel = $spreadItem;
    }

    public function index()
    {
        $spreadItems = $this->getSpreadFromRedis();
        $filterd = [];
        foreach ($spreadItems as $spreadItem) {
            $filterd []= collect($spreadItem)->only(['spread_description']);
        }
        return $this->apiResponse(200, 'Spread Items Data', null, $filterd);
    }

    public function create($request)
    {
        $spreadItem = $this->spreadItemModel::create([
            'item' => $request->item,
            'spread_description_id' => $request->spread_description_id
        ]);
        return $this->apiResponse(200, 'Spread Item Was Created', null, $spreadItem);
    }

    public function delete($request)
    {
        $this->findSpreadItem($request->id)->delete();
        return $this->apiResponse(200, 'Spread Item Was Deleted');
    }

    public function update($request)
    {
        $this->findSpreadItem($request->id)->update([
            'item' => $request->item,
            'spread_description_id' => $request->spread_description_id
        ]);
        return $this->apiResponse(200, 'Spread Item Was update');
    }
}
