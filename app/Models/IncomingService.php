<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomingService extends Model
{
    use HasFactory;

    protected $fillable = ['service_id','percentage','cost_oil','price_to_add','total_value'];
}

