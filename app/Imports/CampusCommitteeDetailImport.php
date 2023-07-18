<?php

namespace App\Imports;

use App\Models\Campus;
use App\Models\CampusCommitteeDetail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CampusCommitteeDetailImport implements ToModel, WithStartRow
{
    protected $campus;

    public function __construct(Campus $campus)
    {
        $this->campus = $campus;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        return new CampusCommitteeDetail([
            'name' => $row[1],
            'phone' => $row[2],
            'image' => $row[3],
            'position' => $row[4],
            'email' => $row[5],
            'campus_id' => $this->campus->id,
        ]);
    }

    public function startRow():int
    {
        # code...
        return 2;

    }
}
