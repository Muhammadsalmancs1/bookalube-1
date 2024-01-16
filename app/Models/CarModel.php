<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable =['name'];


    public function brands()
    {
        return $this->belongsToMany(CarBrand::class, 'make_combinations', 'car_model_id', 'car_brand_id');
    }
}
