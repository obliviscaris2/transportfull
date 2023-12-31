<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExecutiveDetail extends Model
{
    use HasFactory;
    protected $fillable = ['sn','name', 'image', 'phone', 'email', 'position'];
}
