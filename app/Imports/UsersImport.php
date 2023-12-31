<?php

namespace App\Imports;

use App\Models\CommitteeDetail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CommitteeDetail([
            'district'     => $row[0],
            'name'    => $row[1],
            'address' => $row[2],
            'phone' => $row[3]
        ]);

    }
    public function startRow(): int
    {
        # code...
        return 2;

    }
}
