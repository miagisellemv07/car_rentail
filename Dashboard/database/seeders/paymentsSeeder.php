<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;/*conexion*/
use Illuminate\Support\Facades\Hash;/*conexion*/
use App\Models\payment;

class paymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("payments")->insert([
    'rental_id' => 1,
    'amount' => 150.00,
    'payment_method' => 'card',
    'transaction_id' => 'TXN123456',
    'status' => 'completed',
    'payment_date'=>date('Y-m-d h:m:s')
]);
    $dato = new Payment();
$dato->rental_id = 1;
$dato->amount = 150.00;
$dato->payment_method = 'card';
$dato->transaction_id = 'TXN123456';
$dato->status = 'completed';
$dato->payment_date = now();
$dato->save();
    }
}
