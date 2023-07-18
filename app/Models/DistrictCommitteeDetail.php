<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistrictCommitteeDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'district_id',
        'name', 
        'phone', 
        'image', 
        'position', 
        'email'
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
