<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalCommitteeDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'local_id',
        'name', 
        'phone', 
        'image', 
        'position', 
        'email'
    ];

    public function campus()
    {
        return $this->belongsTo(Local::class);
    }
}
