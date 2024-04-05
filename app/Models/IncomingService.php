<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomingService extends Model
{
    use HasFactory;

    protected $fillable = ['service_id','percentage','cost_oil',
        'price_to_add','total_value',
    'cost_of_oil','cost_of_fuel',
    ];


    public function incomingServiceVechile()
    {
        return $this->hasMany(IncomingService::class,'incoming_service_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class,'service_id');
    }

}

