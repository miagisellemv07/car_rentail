<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class car extends Model
{
      protected $fillable = [
        'brand_id',
        'model',
        'year',
        'color',
        'license_plate',
        'mileage',
        'lat',
        'lng',
        'is_premiun',
        'rental_count',
        'daily_rate',
        'status'
    ];
}
