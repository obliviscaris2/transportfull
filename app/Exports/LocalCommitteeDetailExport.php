<?php

namespace App\Exports;

use App\Models\Local;
use App\Models\LocalCommitteeDetail;
use Maatwebsite\Excel\Concerns\FromCollection;

class LocalCommitteeDetailExport implements FromCollection
{
    protected $local;

    public function __construct(Local $local)
    {
        $this->local = $local;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return LocalCommitteeDetail::where('local_id', $this->local->id)->get();
    }
}