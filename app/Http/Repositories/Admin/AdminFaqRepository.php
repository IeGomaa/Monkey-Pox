<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminFaqInterface;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\Faq\FaqTrait;
use App\Http\Traits\Redis\FaqRedis;
use App\Models\Faq;

class AdminFaqRepository implements AdminFaqInterface
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
        return $this->apiResponse(200, 'Faqs Data', null, $faqs);
    }

    public function create($request)
    {
        $faq = $this->faqModel::create([
            'question' => $request->question,
            'answer' => $request->answer
        ]);
        $this->setFaqsIntoRedis();
        return $this->apiResponse(200, 'Faqs Was Created', null, $faq);
    }

    public function delete($request)
    {
        $this->findFaq($request->id)->delete();
        $this->setFaqsIntoRedis();
        return $this->apiResponse(200, 'Faqs Was Deleted');
    }

    public function update($request)
    {
        $this->findFaq($request->id)->update([
            'question' => $request->question,
            'answer' => $request->answer
        ]);
        $this->setFaqsIntoRedis();
        return $this->apiResponse(200, 'Faqs Was Updated');
    }
}
