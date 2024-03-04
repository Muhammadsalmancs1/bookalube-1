<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CarYear
 *
 * @property $id
 * @property $year
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CarYear extends Model
{

    static $rules = [
        'year' => 'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['year'];

    public function brands()
    {
        return $this->belongsToMany(CarBrand::class, 'year_combinations', 'car_year_id', 'car_brand_id');
    }
    public function yearCombinations()
    {
        return $this->hasMany(YearCombination::class);
    }

    public function literCombinations()
    {
        return $this->belongsTo(LiterCombination::class);
    }


}
