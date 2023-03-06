<?php

namespace App\Http\Traits\Faq;

trait FaqTrait
{
    private function getFaqs()
    {
        return $this->faqModel::get();
    }

    private function findFaq($id)
    {
        return $this->faqModel::find($id);
    }
}
