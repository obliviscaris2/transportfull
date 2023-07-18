<?php

namespace App\Models;

use App\Models\Pdf;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MemberInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        
    ];

    public function pdf()
    {
        return $this->hasOne(Pdf::class);
    }
}
