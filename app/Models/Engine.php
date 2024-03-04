<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Engine
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Engine extends Model
{

    static $rules = [
        'name'=> 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public function models()
    {
        return $this->belongsToMany(CarModel::class, 'model_combinations', 'engine_id', 'car_model_id');
    }

    public function literCombinations()
    {
        return $this->belongsTo(LiterCombination::class);
    }
}
