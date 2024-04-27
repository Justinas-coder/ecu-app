<?php

namespace App\Imports;

use App\Models\Ecu;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EcuImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Ecu|null
     */
    public function model(array $row)
    {
        return new Ecu([
            'dump_id' => $row['dump_id'],
            'ecu' => $row['ecu'],
            'attribute' => $row['attribute'],
            'value' => $row['value']

        ]);
    }
}
