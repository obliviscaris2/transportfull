<?php

namespace App\Exports;

use App\Models\CentralCommitteeDetail;
use Maatwebsite\Excel\Concerns\FromCollection;

class CentralCommitteeDetailExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CentralCommitteeDetail::all();
    }
}