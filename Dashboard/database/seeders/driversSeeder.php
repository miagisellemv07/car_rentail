<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;/*conexion*/
use Illuminate\Support\Facades\Hash;/*conexion*/
use App\Models\driver;

class driversSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table("drivers")->insert([
            'user_id'=>1,
            'license_number'=>'ABC1',
            'license_img'=>'default.jpg'
        ]);
         $dato= new driver(); //insert into
        $dato->user_id=1;
        $dato->license_number='ABC2';
         $dato->license_img='default.jpg';
        $dato->save();
    }
}
