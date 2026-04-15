<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rental extends Model
{
    protected $fillable = [
        'user_id',
        'car_id',
        'driver_id',
        'pickup_date',
        'return_date',
        'total_amount',
        'status'
    ];
       public function User(){
        return $this->belongsTo(user::class);
    }
        public function car(){
        return $this->belongsTo(car::class);
    }
        public function driver(){
        return $this->belongsTo(driver::class);
    }
}
