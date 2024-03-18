<?php

namespace App\Models;

use App\Models\Bay;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BayTimeslot
 *
 * @property $id
 * @property $bay_id
 * @property $start_time
 * @property $end_time
 * @property $created_at
 * @property $updated_at
 *
 * @property Bay $bay
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class BayTimeslot extends Model
{

    static $rules = [
		'bay_id' => 'required',
    ];
    protected $perPage = 20;
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['bay_id','start_time','end_time'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function bay()
    {
        return $this->belongsTo('App\Models\Bay','bay_id');
    }
}
