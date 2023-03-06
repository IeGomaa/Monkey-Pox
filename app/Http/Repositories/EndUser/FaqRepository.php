<?php

namespace App\Http\Repositories\EndUser;

use App\Http\Interfaces\EndUser\FaqInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Redis\FaqRedis;
use App\Models\Faq;

class FaqRepository implements FaqInterface
{
    private $faqModel;
    use ApiResponseTrait, FaqRedis;
    public function __construct(Faq $faq)
    {
        $this->faqModel = $faq;
    }

    public function index()
    {
        $faqs = $this->getFaqsFromRedis();
        return $this->apiResponse(200,'Faqs Data', null, $faqs);
    }
}
