<?php

namespace App\Imports;

use App\Models\CentralCommitteeDetail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CentralCommitteeDetailImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CentralCommitteeDetail([
            'name' => $row[1],
            'phone' => $row[2],
            'image' => $row[3],
            'position' => $row[4],
            'email' => $row[5],

        ]);
    }

    public function startRow():int
    {
        # code...
        return 2;

    }
}
