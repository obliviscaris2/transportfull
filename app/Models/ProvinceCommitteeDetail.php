<?php

namespace App\Models;

use App\Models\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProvinceCommitteeDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'province_id',
        'name', 
        'phone', 
        'image', 
        'position', 
        'email'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
