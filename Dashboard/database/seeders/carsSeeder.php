<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;/*conexion*/
use Illuminate\Support\Facades\Hash;/*conexion*/
use App\Models\car;

class carsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
 DB::table("cars")->insert([
        'brand_id'=> 1,
        'model'=>'Tacoma',
        'year'=>2020,
        'color'=>'Rosa',
        'license_plate'=>'MIV34G',
        'mileage'=>76478365,
        'lat'=>54.45,
        'lng'=>356.32,
        'is_premiun'=>1,
        'rental_count'=>5,
        'daily_rate'=>678,
        'status'=>'available'
        ]);
         $dato= new car(); //insert into
         $dato->brand_id=1;
        $dato->year=2020;
        $dato->model ='Corolla';
        $dato->color='Rosa';
        $dato->license_plate='MIV35G';
        $dato->mileage=76478365;
        $dato->lat=54.45;
        $dato->lng=356.32;
        $dato->is_premiun=1;
        $dato->rental_count=5;
        $dato->daily_rate=678;
        $dato->status='available';
        $dato->save();
    }
}
