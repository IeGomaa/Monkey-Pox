<?php

namespace App\Http\Traits\Complication;

trait ComplicationTrait
{
    private function getComplications()
    {
        return $this->complicationModel::get();
    }

    private function findComplication($id)
    {
        return $this->complicationModel::find($id);
    }
}
