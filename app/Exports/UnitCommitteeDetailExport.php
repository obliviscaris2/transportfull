<?php

namespace App\Exports;

use App\Models\Unit;
use App\Models\UnitCommitteeDetail;
use Maatwebsite\Excel\Concerns\FromCollection;

class UnitCommitteeDetailExport implements FromCollection
{
    protected $unit;

    public function __construct(Unit $unit)
    {
        $this->unit = $unit;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return UnitCommitteeDetail::where('unit_id', $this->unit->id)->get();
    }
}