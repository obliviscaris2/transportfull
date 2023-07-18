<?php

namespace App\Imports;

use App\Models\ExecutiveDetail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ExecutiveDetailImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ExecutiveDetail([
            'sn' => $row[0],
            'name' => $row[1],
            'image' => $row[2],
            'phone' => $row[3],
            'email' => $row[4],
            'position' => $row[5],

        ]);
    }

    public function startRow():int
    {
        # code...
        return 2;

    }
}
