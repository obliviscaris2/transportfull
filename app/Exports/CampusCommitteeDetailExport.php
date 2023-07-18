<?php

namespace App\Exports;

use App\Models\Campus;
use App\Models\CampusCommitteeDetail;
use Maatwebsite\Excel\Concerns\FromCollection;

class CampusCommitteeDetailExport implements FromCollection
{
    protected $campus;

    public function __construct(Campus $campus)
    {
        $this->campus = $campus;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CampusCommitteeDetail::where('campus_id', $this->campus->id)->get();
    }
}