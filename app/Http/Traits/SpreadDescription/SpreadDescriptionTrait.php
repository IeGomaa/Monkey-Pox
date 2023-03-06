<?php

namespace App\Http\Traits\SpreadDescription;

trait SpreadDescriptionTrait
{
    private function getSpreadDescriptions()
    {
        return $this->spreadDescriptionModel::with('spread')->get();
    }

    private function findSpreadDescription($id)
    {
        return $this->spreadDescriptionModel::with('spread')->find($id);
    }
}
