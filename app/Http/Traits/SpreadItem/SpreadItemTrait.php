<?php

namespace App\Http\Traits\SpreadItem;

trait SpreadItemTrait
{
    private function getSpreadItems()
    {
        return $this->spreadItemModel::with('spread_description')->get();
    }

    private function findSpreadItem($id)
    {
        return $this->spreadItemModel::with('spread_description')->find($id);
    }
}
