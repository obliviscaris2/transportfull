<?php

namespace App\Imports;

use App\Models\District;
use App\Models\DistrictCommitteeDetail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class DistrictCommitteeDetailImport implements ToModel, WithStartRow
{
    protected $district;

    public function __construct(District $district)
    {
        $this->district = $district;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        return new DistrictCommitteeDetail([
            'name' => $row[1],
            'phone' => $row[2],
            'image' => $row[3],
            'position' => $row[4],
            'email' => $row[5],
            'district_id' => $this->district->id,
        ]);
    }

    public function startRow():int
    {
        # code...
        return 2;

    }
}
