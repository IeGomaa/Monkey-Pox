<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Interfaces\EndUser\NewsDescriptionInterface;

class NewsDescriptionController
{
    private $newsDescriptionInterface;
    public function __construct(NewsDescriptionInterface $interface)
    {
        $this->newsDescriptionInterface = $interface;
    }

    public function index($news_id)
    {
        return $this->newsDescriptionInterface->index($news_id);
    }
}
