<?php

namespace App\Models;

use App\Models\MemberInformation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pdf extends Model
{
    use HasFactory;

    protected $fillable = [
        'pdf'
    ];

    public function memberInformation()
    {
        return $this->belongsTo(MemberInformation::class);
    }
}
