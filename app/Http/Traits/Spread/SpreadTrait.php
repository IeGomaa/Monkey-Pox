<?php

namespace App\Http\Traits\Spread;

trait SpreadTrait
{
    private function getSpreads()
    {
        return $this->spreadModel::get();
    }

    private function findSpread($id)
    {
        return $this->spreadModel::find($id);
    }
}
