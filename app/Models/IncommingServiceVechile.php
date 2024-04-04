<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncommingServiceVechile extends Model
{
    use HasFactory;

    protected $table = 'incoming_service_vechile';

    protected $fillable = ['vechile_id','incoming_service_id','total_cost'];
}
