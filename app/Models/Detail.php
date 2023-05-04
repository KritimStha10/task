<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $fillable=[
        'Child_First_Name',
        'Child_Middle_Name',
        'Child_Last_Name',
        'Child_Age',
        'Gender',
        'Child_Address',
        'Child_City',
        'Child_State',
        'Country',
        'Child_Zip_Code',
        'status',

    ];
}
