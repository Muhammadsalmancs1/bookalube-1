<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LeaveManagement
 *
 * @property $id
 * @property $leave_date
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class LeaveManagement extends Model
{

    static $rules = [
    ];
    protected  $table ='leave_managements';
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['leave_date'];



}
