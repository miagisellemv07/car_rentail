<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;/*conexion*/
use Illuminate\Support\Facades\Hash;/*conexion*/
use App\Models\user;
class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([
    'name' => 'Mia Minjarez',
    'email' => 'Mia@gmail.com',
    'password' => Hash::make('123456'), 
    'img'=>'default.jpg',
    'loyalty_points' => 100,            
    'loyalty_level_id' => 1             
]);
$dato = new User();
$dato->name = 'Mia Minjarez';
$dato->email = 'Mia@gmail.com';
$dato->password = Hash::make('123456');
$dato->img = 'default.jpg';
$dato->loyalty_points = 100;
$dato->loyalty_level_id = 1;
$dato->save();
    }
}
