<?php

namespace App\Exports;

use App\Models\Country;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CountryExport implements FromView, WithStyles
{
    public function view(): View
    {
        $countries = Country::get();
        return view('country.excel', compact('countries'));
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1 => [
                'font' => ['bold' => true]
            ]
        ];
    }
}
