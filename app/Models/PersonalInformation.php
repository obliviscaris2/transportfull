<?php

namespace App\Models;

use App\Models\Pdf;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PersonalInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'profile_image',
        'np_fullname',
        'en_fullname',
        'dob',
        'perma_address',
        'temp_address',
        'gender',
        'position',
        'college',
        'faculty',
        'edu_level',
        'phone',
        'description',
        'blood_group',
        'id_number',
        'citizenship',
    ];

    protected $casts = [
        'citizenship' => 'array',
    ];


    public function pdf()
    {
        return $this->hasOne(Pdf::class);
    }

    // public static function boot()
    // {
        
    //     parent::boot();
    //     self::creating(function ($model) {
    //         $model->membershipno = IdGenerator::generate([
    //             'table' => 'personal_information',  
    //             'field' => 'membershipno',
    //             'length' => 6, 
    //             'prefix' => '1',
    //             'reset_on_prefix_change' => true
    //         ]);
    //     });
    // }
}
