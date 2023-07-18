<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardGenerate extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'name',
        'email',
        'phone',
        'address',
        'position',
        'blood_group',
        'committee',
        'id_number',
        'membershipno',
        'approval_name',
        'approval_position',
        'card_issue_date',
        'expiry_date',
    ];
}
