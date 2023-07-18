<?php

namespace App\Models;

use App\Models\DistrictCommitteeDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class District extends Model
{
    use HasFactory;

    public function __toString()
    {
        return $this->name;
    }

    public function districtDetails()
    {
        return $this->hasMany(DistrictCommitteeDetail::class);
    }

}
