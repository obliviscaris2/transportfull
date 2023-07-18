<?php

namespace App\Imports;

use App\Models\Province;
use App\Models\ProvinceCommitteeDetail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ProvinceCommitteeDetailImport implements ToModel, WithStartRow
{
    protected $province;

    public function __construct(Province $province)
    {
        $this->province = $province;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        return new ProvinceCommitteeDetail([
            'name' => $row[1],
            'phone' => $row[2],
            'image' => $row[3],
            'position' => $row[4],
            'email' => $row[5],
            'province_id' => $this->province->id,
        ]);
    }

    public function startRow():int
    {
        # code...
        return 2;

    }
}
