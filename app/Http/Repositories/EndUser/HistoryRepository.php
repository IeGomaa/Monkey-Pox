<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\HistoryInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Redis\HistoryRedis;
use App\Models\History;

class HistoryRepository implements HistoryInterface
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
        return $this->apiResponse(200,'Histories Data', null, $histories);
    }
}
