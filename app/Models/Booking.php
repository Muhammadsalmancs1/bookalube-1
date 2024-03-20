<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = ['user_id','vechile_id','bay_id','bay_timeslot_id',
        'booking_date','extra_services','total_price','booking_status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function users()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function bay()
    {
        return $this->hasOne('App\Models\Bay', 'id', 'bay_id');
    }
    public function bayTimeSlot()
    {
        return $this->hasOne('App\Models\BayTimeslot', 'id', 'bay_timeslot_id');
    }
    public function vechile()
    {
        return $this->hasOne('App\Models\Vechile', 'id', 'vechile_id');
    }
}
