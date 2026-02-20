<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class loyalty_level extends Model
{
     protected $fillable = [
        'name',
        'main_points',
        'discount_percentage',
        'free_extra_hours'
    ];
}
