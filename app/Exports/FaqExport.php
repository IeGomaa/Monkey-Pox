<?php

namespace App\Exports;

use App\Models\faq;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class FaqExport implements FromView, WithStyles
{
    public function view(): View
    {
        $faqs = Faq::get();
        return view('faq.excel', compact('faqs'));
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
