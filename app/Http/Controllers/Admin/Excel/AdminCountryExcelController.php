<?php

namespace App\Http\Controllers\Admin\Excel;

use App\Exports\CountryExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Excel\Country\ImportCountryRequest;
use App\Http\Traits\ApiResponseTrait;
use App\Imports\CountryImport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AdminCountryExcelController extends Controller
{
    use ApiResponseTrait;
    public function import(ImportCountryRequest $request)
    {
        Excel::import(new CountryImport, $request->file);
        return $this->apiResponse(200, 'Country File Is Uploaded Successfully');
    }

    public function export(): BinaryFileResponse
    {
        return Excel::download(new CountryExport, 'test.xlsx');
    }
}
