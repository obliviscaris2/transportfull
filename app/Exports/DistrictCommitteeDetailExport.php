<?php

namespace App\Exports;

use App\Models\District;
use App\Models\DistrictCommitteeDetail;
use Maatwebsite\Excel\Concerns\FromCollection;

class DistrictCommitteeDetailExport implements FromCollection
{
    protected $district;

    public function __construct(District $district)
    {
        $this->district = $district;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DistrictCommitteeDetail::where('district_id', $this->district->id)->get();
    }
}