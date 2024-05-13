<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vechile extends Model
{
    use HasFactory;

    protected $table   = 'vechiles';

    protected $fillable =['user_id','car_name','car_year_id',
        'car_brand_id','car_model_id','engine_id','air_filter_id','engine_oil_id','engine_oil_filter','fuel_filter','oil_filter','transmission_filter','kilometer'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function carBrand()
    {
        return $this->hasMany('App\Models\CarBrand', 'id', 'car_brand_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */



    public function carModel()
    {
        return $this->hasMany('App\Models\CarModel', 'id', 'car_model_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function carYear()
    {
        return $this->hasMany('App\Models\CarYear', 'id', 'car_year_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function engine()
    {
        return $this->hasMany('App\Models\Engine', 'id', 'engine_id');
    }

}
