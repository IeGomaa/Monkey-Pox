<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminAwardInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Award\AwardTrait;
use App\Models\Award;

class AdminAwardRepository implements AdminAwardInterface
{
    use AwardTrait, ApiResponseTrait;
    private $awardModel;
    public function __construct(Award $award)
    {
        $this->awardModel = $award;
    }

    public function index()
    {
        $awards = $this->getAwards();
        return $this->apiResponse(200, 'Award Data', null, $awards);
    }

    public function create($request)
    {
        $award = $this->awardModel::create([
            'award' => $request->award,
            'doctor_id' => $request->doctor_id
        ]);
        return $this->apiResponse(200, 'Award Was Created', null, $award);
    }

    public function delete($request)
    {
        $this->findAward($request->id)->delete();
        return $this->apiResponse(200, 'Award Was Deleted');
    }

    public function update($request)
    {
        $this->findAward($request->id)->update([
            'award' => $request->award,
            'doctor_id' => $request->doctor_id
        ]);
        return $this->apiResponse(200, 'Award Was Updated');
    }
}
