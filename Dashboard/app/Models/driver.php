<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class driver extends Model
{
     protected $fillable = [
        'user_id',
        'license_number',
        'license_img'
    ]; 
    public function User(){
        return $this->belongsTo(user::class);
    }
}
