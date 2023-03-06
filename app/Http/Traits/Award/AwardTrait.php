<?php

namespace App\Http\Traits\Award;

trait AwardTrait
{
    private function getAwards()
    {
        return $this->awardModel::with('doctor')->get();
    }

    private function findAward($award_id)
    {
        return $this->awardModel::with('doctor')->find($award_id);
    }
}
