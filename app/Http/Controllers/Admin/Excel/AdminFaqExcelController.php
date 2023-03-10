<?php

namespace App\Http\Controllers\Admin\Excel;

use App\Exports\FaqExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Excel\Faq\ImportFaqRequest;
use App\Http\Traits\ApiResponseTrait;
use App\Imports\FaqImport;
use Maatwebsite\Excel\Facades\Excel;

class AdminFaqExcelController extends Controller
{
    use ApiResponseTrait;
    public function import(ImportFaqRequest $request)
    {
        Excel::import(new FaqImport, $request->file);
        return $this->apiResponse(200, 'Faqs File Is Uploaded Successfully');
    }

    public function export()
    {
        return Excel::download(new FaqExport, 'faqs.xlsx');
    }
}
