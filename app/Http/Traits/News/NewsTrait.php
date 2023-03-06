<?php

namespace App\Http\Traits\News;

trait NewsTrait
{
    private function getNews()
    {
        return $this->newsModel::get();
    }

    private function findNews($id)
    {
        return $this->newsModel::find($id);
    }
}
