<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;/*conexion*/
use Illuminate\Support\Facades\Hash;/*conexion*/
use App\Models\rental;

class rentalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    DB::table("rentals")->insert([
    'user_id' => 1,
    'car_id' => 1,
    'driver_id' => 1,
    'pickup_date' => '2026-02-21', 
    'return_date' => '2026-02-25', 
    'total_amount' => 300.00,
    'status' => 'active'
]); 
     $dato = new Rental();
$dato->user_id = 1;
$dato->car_id = 1;
$dato->driver_id = 1;
$dato->pickup_date = '2026-02-21';
$dato->return_date = '2026-02-25';
$dato->total_amount = 300.00;
$dato->status = 'active';
$dato->save();
    }
    
}
