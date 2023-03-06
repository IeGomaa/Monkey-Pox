<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\NewsDescriptionInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Redis\NewsRedis;
use App\Models\News;

class NewsDescriptionRepository implements NewsDescriptionInterface
{
    private $newsModel;
    use ApiResponseTrait, NewsRedis;
    public function __construct(News $news)
    {
        $this->newsModel = $news;
    }

    public function index($news_id)
    {
        $news = $this->getNewsFromRedis();
        $newsDescription = $news->where('id', $news_id)->first();
        if ($newsDescription) {
            $newsDescription = $newsDescription->only(['title', 'date', 'description']);
            return $this->apiResponse(200, 'News Description Data', null, $newsDescription);
        }
        return $this->apiResponse(200, 'News Description Not Found');
    }
}
