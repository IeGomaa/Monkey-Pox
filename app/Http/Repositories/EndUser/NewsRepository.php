<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\NewsInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Redis\NewsRedis;
use App\Models\News;

class NewsRepository implements NewsInterface
{
    private $newsModel;
    use ApiResponseTrait, NewsRedis;
    public function __construct(News $news)
    {
        $this->newsModel = $news;
    }

    public function index()
    {
        $news = $this->getNewsFromRedis();
        return $this->apiResponse(200, 'News Data', null, $news);
    }
}
