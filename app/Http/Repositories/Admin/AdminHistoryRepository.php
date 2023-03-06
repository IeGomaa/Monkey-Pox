<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminHistoryInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\History\HistoryTrait;
use App\Http\Traits\Redis\HistoryRedis;
use App\Models\History;

class AdminHistoryRepository implements AdminHistoryInterface
{
    private $historyModel;
    use ApiResponseTrait, HistoryRedis;
    public function __construct(History $history)
    {
        $this->historyModel = $history;
    }

    public function index()
    {
        $histories = $this->getHistoriesFromRedis();
        dd($histories);
        return $this->apiResponse(200, 'History Data', null, $histories);
    }

    public function create($request)
    {
        $history = $this->historyModel::create([
            'description' => $request->description
        ]);
        $this->setHistoriesIntoRedis();
        return $this->apiResponse(200, 'History Was Created', null, $history);
    }

    public function delete($request)
    {
        $this->findHistory($request->id)->delete();
        $this->setHistoriesIntoRedis();
        return $this->apiResponse(200, 'History Was Deleted');
    }

    public function update($request)
    {
        $this->findHistory($request->id)->update([
            'description' => $request->description
        ]);
        $this->setHistoriesIntoRedis();
        return $this->apiResponse(200, 'History Was Updated');
    }
}
