<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CarBrand
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CarBrand extends Model
{

    static $rules = [
        'name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];


    public function years()
    {
        return $this->belongsToMany(CarYear::class, 'year_combinations', 'car_brand_id', 'car_year_id');
    }

    public function models()
    {
        return $this->belongsToMany(CarModel::class, 'make_combinations', 'car_brand_id', 'car_model_id');
    }
    public function makeCombinations()
    {
        return $this->hasMany(MakeCombination::class);
    }


}
