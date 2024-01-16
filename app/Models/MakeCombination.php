<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MakeCombination
 *
 * @property $id
 * @property $car_brand_id
 * @property $car_model_id
 * @property $created_at
 * @property $updated_at
 *
 * @property CarBrand $carBrand
 * @property CarModel $carModel
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MakeCombination extends Model
{

    static $rules = [
		'car_brand_id' => 'required',
		'car_model_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['car_brand_id','car_model_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function carBrand()
    {
        return $this->belongsTo('App\Models\CarBrand', 'id', 'car_brand_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function carModel()
    {
        return $this->hasOne('App\Models\CarModel', 'id', 'car_model_id');
    }


}
