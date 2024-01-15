<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OilFilter
 *
 * @property $id
 * @property $name
 * @property $price
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class OilFilter extends Model
{

    static $rules = [
        'name'=>'required',
        'price'=>'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','price'];



}
