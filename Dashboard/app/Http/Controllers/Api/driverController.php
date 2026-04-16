<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\driver;

class driverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $driver=driver::all();
        return response()->json([
            "data"=>$driver,
            "status"=>"success"
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
{
    $validated = $request->validate([
        'user_id' => 'required|integer',
        'license_number' => 'required|string',
        'license_img' => 'required|string'
    ]);

    $driver = new driver();
    $driver->user_id = $request->user_id;
    $driver->license_number = $request->license_number;
    $driver->license_img = $request->license_img;

    $driver->save();

    return response()->json([
        "data" => $driver,
        "status" => "success"
    ], 201);
}
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
         $driver=driver::find($id);
        if($driver == null){
            return response()->json([
                "message"=>"driver no encontrado",
                "status"=>"Error"
            ],404);
        }
        return response()->json([
            "data"=>$driver,
            "status"=>"Success"
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $validated = $request->validate([
        'user_id' => 'required|integer',
        'license_number' => 'required|string',
        'license_img' => 'required|string'
    ]);

   $driver = driver::find($id);
    $driver->user_id = $request->user_id;
    $driver->license_number = $request->license_number;
    $driver->license_img = $request->license_img;

    $driver->save();

    return response()->json([
        "data" => $driver,
        "status" => "success"
    ], 201);
}
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          $driver = driver::find($id);
        if($driver == null){
            return response()->json([
                "error"=>"Registro NO ENCONTRADO",
                "status"=>"ERROR"
            ],404);
        }
        $driver->delete();
        return response()->json([
            "status"=>"Success",
            "message"=>"Registro eliminado correctamente"
        ],204);
    }
}
