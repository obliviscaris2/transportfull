<?php

namespace App\Imports;

use App\Models\Unit;
use App\Models\UnitCommitteeDetail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UnitCommitteeDetailImport implements ToModel, WithStartRow
{
    protected $unit;

    public function __construct(Unit $unit)
    {
        $this->unit = $unit;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        return new UnitCommitteeDetail([
            'name' => $row[1],
            'phone' => $row[2],
            'image' => $row[3],
            'position' => $row[4],
            'email' => $row[5],
            'unit_id' => $this->unit->id,
        ]);
    }

    public function startRow():int
    {
        # code...
        return 2;

    }
}
