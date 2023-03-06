<?php

namespace App\Http\Traits\Prevention;

trait PreventionTrait
{
    private function getPreventions()
    {
        return $this->preventionModel::get();
    }

    private function findPrevention($id)
    {
        return $this->preventionModel::find($id);
    }
}
