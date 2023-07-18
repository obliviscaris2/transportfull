<?php

namespace App\Models;

use App\Models\ProvinceCommitteeDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Province extends Model
{
    use HasFactory;

    public function __toString()
    {
        return $this->name;
    }

    public function committeeDetails()
    {
        return $this->hasMany(ProvinceCommitteeDetail::class);
    }
}
