<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LiterCombination
 *
 * @property $id
 * @property $liter
 * @property $car_year_id
 * @property $car_brand_id
 * @property $car_model_id
 * @property $engine_id
 * @property $created_at
 * @property $updated_at
 *
 * @property CarBrand $carBrand
 * @property CarModel $carModel
 * @property CarYear $carYear
 * @property Engine $engine
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class LiterCombination extends Model
{

    static $rules = [
		'car_year_id' => 'required',
		'car_brand_id' => 'required',
		'car_model_id' => 'required',
		'engine_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['liter','car_year_id','car_brand_id','car_model_id','engine_id'];

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
