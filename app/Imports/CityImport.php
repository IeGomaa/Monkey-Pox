<?php

namespace App\Imports;

use App\Models\city;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CityImport implements ToModel, WithValidation, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new city([
            'name' => $row['name'],
            'country_id' => $row['country_id']
        ]);
    }

    public function rules(): array
    {
        return City::createRule();
    }
}
