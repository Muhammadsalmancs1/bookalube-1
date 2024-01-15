<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AirFilter
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
class AirFilter extends Model
{

    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','price'];



}
