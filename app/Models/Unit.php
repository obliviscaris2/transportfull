<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    public function __toString()
    {
        return $this->name;
    }

    public function unitDetails()
    {
        return $this->hasMany(UnitCommitteeDetail::class);
    }
}
