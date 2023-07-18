<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;

    public function __toString()
    {
        return $this->name;
    }

    public function localDetails()
    {
        return $this->hasMany(LocalCommitteeDetail::class);
    }
}
