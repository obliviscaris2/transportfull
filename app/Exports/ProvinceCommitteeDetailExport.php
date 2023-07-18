<?php

namespace App\Exports;

use App\Models\Province;
use App\Models\ProvinceCommitteeDetail;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProvinceCommitteeDetailExport implements FromCollection
{
    protected $province;

    public function __construct(Province $province)
    {
        $this->province = $province;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ProvinceCommitteeDetail::where('province_id', $this->province->id)->get();
    }
}