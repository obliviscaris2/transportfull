<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampusCommitteeDetail extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'campus_id',
        'name', 
        'phone', 
        'image', 
        'position', 
        'email'
    ];

    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }
}
