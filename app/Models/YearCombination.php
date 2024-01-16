<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class YearCombination
 *
 * @property $id
 * @property $car_brand_id
 * @property $car_year_id
 * @property $created_at
 * @property $updated_at
 *
 * @property CarBrand $carBrand
 * @property CarYear $carYear
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class YearCombination extends Model
{


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['car_brand_id','car_year_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function carBrand()
    {
        return $this->hasOne('App\Models\CarBrand', 'id', 'car_brand_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function carYear()
    {
        return $this->belongsTo('App\Models\CarYear', 'id', 'car_year_id');
    }



}
