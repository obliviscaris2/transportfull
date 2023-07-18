<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    use HasFactory;

    public function __toString()
    {
        return $this->name;
    }

    public function campusDetails()
    {
        return $this->hasMany(CampusCommitteeDetail::class);
    }
}
