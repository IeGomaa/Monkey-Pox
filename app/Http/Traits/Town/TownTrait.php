<?php

namespace App\Http\Traits\Town;

trait TownTrait
{
    private function getTowns()
    {
        return $this->townModel::with('city')->get();
    }

    private function findTown($id)
    {
        return $this->townModel::with('city')->find($id);
    }
}
