<?php

namespace App\Imports;

use App\Models\Faq;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class FaqImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Faq([
            'question' => $row['question'],
            'answer' => $row['answer']
        ]);
    }

    public function rules(): array
    {
        return Faq::createRule();
    }
}
