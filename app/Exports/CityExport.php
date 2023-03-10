<?php

namespace App\Exports;

use App\Models\city;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CityExport implements FromView, WithStyles
{
    /**
    * @return Collection
    */
    public function collection(): Collection
    {
        return city::get();
    }

    public function view(): View
    {
        $cities = City::get();
        return view('city.excel', compact('cities'));
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
