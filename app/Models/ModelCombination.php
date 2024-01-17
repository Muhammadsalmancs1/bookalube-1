<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ModelCombination
 *
 * @property $id
 * @property $car_model_id
 * @property $engine_id
 * @property $created_at
 * @property $updated_at
 *
 * @property CarModel $carModel
 * @property Engine $engine
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ModelCombination extends Model
{

    static $rules = [
		'car_model_id' => 'required',
		'engine_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['car_model_id','engine_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function carModel()
    {
        return $this->hasOne('App\Models\CarModel', 'id', 'car_model_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function engine()
    {
        return $this->hasOne('App\Models\Engine', 'id', 'engine_id');
    }


}
