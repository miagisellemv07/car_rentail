<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;/*conexion*/
use Illuminate\Support\Facades\Hash;/*conexion*/
use App\Models\loyalty_level;

class loyalty_levelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table("loyalty_levels")->insert([
        'name' => 'VIP',
        'main_points' => 1000,
        'discount_percentage' => 20,
        'free_extra_hours' => 2
        ]);
         $dato= new loyalty_levels(); //insert into
        $dato->name = 'VIP';
        $dato->main_points = 1000;
        $dato->discount_percentage = 20;
        $dato->free_extra_hours = 2;
        $dato->save();
    }
}
