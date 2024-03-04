<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vechile extends Model
{
    use HasFactory;

    protected $table   = 'vechiles';

    protected $fillable =['user_id','car_name','car_year_id',
        'car_brand_id','car_model_id','engine_id'];

}
