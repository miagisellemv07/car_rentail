<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\rental;
//php artisan make:controller Api/NombreController --api
class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           $rentals=rental::with(['User','car','driver'])->get();
        return response()->json([
            "data"=>$rentals,
            "status"=>"success"
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $valideted = $request->validate([
        'user_id'=>'required',
        'car_id'=>'required',
        'driver_id'=>'required',
        'pickup_date'=>'required|date',
        'return_date'=>'required|date',
        'total_amount'=>'required',
        'status'=>'required',
      
        ]);
        $rental =new rental();
        $rental->user_id=$request->user_id;
        $rental->car_id=$request->car_id;
        $rental->driver_id=$request->driver_id;
        $rental->pickup_date=$request->pickup_date;
        $rental->return_date=$request->return_date;
        $rental->total_amount=$request->total_amount;
        $rental->status=$request->status;
    
        $rental->save();

        return response()->json([
            "data"=>$rental,
            "status"=>"success"
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
          $rental=rental::find($id);
        if($rental == null){
            return response()->json([
                "message"=>"Rental no encontrado",
                "status"=>"Error"
            ],404);
        }
        return response()->json([
            "data"=>$rental,
            "status"=>"Success"
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $valideted = $request->validate([
        'user_id'=>'required',
        'car_id'=>'required',
        'driver_id'=>'required',
        'pickup_date'=>'required|date',
        'return_date'=>'required|date',
        'total_amount'=>'required',
        'status'=>'required',
      
        ]);
        $rental = rental::find($id);
        $rental->user_id=$request->user_id;
        $rental->car_id=$request->car_id;
        $rental->driver_id=$request->driver_id;
        $rental->pickup_date=$request->pickup_date;
        $rental->return_date=$request->return_date;
        $rental->total_amount=$request->total_amount;
        $rental->status=$request->status;
    
        $rental->save();

        return response()->json([
            "data"=>$rental,
            "status"=>"success"
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $rental = rental::find($id);
        if($rental == null){
            return response()->json([
                "error"=>"Registro NO ENCONTRADO",
                "status"=>"ERROR"
            ],404);
        }
        $rental->delete();
        return response()->json([
            "status"=>"Success",
            "message"=>"Registro eliminado correctamente"
        ],204);
    }
    //  $table->enum('status',['pending','confirmed','active','completed','canceled']); Recuerde actualizar el estatus con estas opciones 
    // i en el buscador busque actualizar el estatus asi: http://localhost:8000/api/rentals/(EL ID)/status
    public function updateStatus(Request $request, string $id)
{
    $validated = $request->validate([
        'status' => 'required|in:pending,confirmed,active,completed,canceled'
    ]);

    $rental = Rental::find($id);

    if ($rental == null) {
        return response()->json([
            "error" => "RENTAL NO ENCONTRADO",
            "status" => "ERROR"
        ], 404);
    }

    $rental->status = $request->status;
    $rental->save();

    return response()->json([
        "data" => $rental,
        "message" => "Estado de la renta actualizado correctamente",
        "status" => "success"
    ], 200);
}
}
