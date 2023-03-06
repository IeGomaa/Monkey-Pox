<?php

namespace App\Http\Traits\History;

trait HistoryTrait
{
    private function getHistories()
    {
        return $this->historyModel::get();
    }

    private function findHistory($id)
    {
        return $this->historyModel::find($id);
    }
}
