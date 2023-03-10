<?php

namespace App\Http\Controllers\Admin\Excel;

use App\Exports\CityExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Excel\City\ImportCityRequest;
use App\Http\Traits\ApiResponseTrait;
use App\Imports\CityImport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AdminCityExcelController extends Controller
{
    use ApiResponseTrait;
    public function import(ImportCityRequest $request)
    {
        Excel::import(new CityImport, $request->file);
        return $this->apiResponse(200, 'City File Is Uploaded Successfully');
    }

    public function export(): BinaryFileResponse
    {
        return Excel::download(new CityExport, 'cities.xlsx');
    }
}
