<?php

namespace App\Imports;

use App\Models\Local;
use App\Models\LocalCommitteeDetail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class LocalCommitteeDetailImport implements ToModel, WithStartRow
{
    protected $local;

    public function __construct(Local $local)
    {
        $this->local = $local;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        return new LocalCommitteeDetail([
            'name' => $row[1],
            'phone' => $row[2],
            'image' => $row[3],
            'position' => $row[4],
            'email' => $row[5],
            'local_id' => $this->local->id,
        ]);
    }

    public function startRow():int
    {
        # code...
        return 2;

    }
}
