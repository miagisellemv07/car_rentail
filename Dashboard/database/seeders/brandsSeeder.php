<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;/*conexion*/
use Illuminate\Support\Facades\Hash;/*conexion*/
use App\Models\brand;
class brandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table("brands")->insert([
            'name'=>'toyota',
            'img'=>'default.jpg'
        ]);
         $dato= new brand(); //insert into
         $dato->name='toyota';
        $dato->img='default.jpg';
        $dato->save();
    }
}
