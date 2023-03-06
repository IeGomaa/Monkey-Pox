<?php

namespace App\Http\Traits\PreventionDescription;

trait PreventionDescriptionTrait
{
    private function getPreventionDescriptions()
    {
        return $this->preventionDescriptionModel::with('prevention')->get();
    }

    private function findPreventionDescription($id)
    {
        return $this->preventionDescriptionModel::with('prevention')->find($id);
    }
}
