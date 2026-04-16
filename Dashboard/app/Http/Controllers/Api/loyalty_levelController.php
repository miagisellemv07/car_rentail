<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\loyalty_level;

class loyalty_levelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $loyalty_level=loyalty_level::all();
        return response()->json([
            "data"=>$loyalty_level,
            "status"=>"success"
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
         $valideted = $request->validate([
        'name'=>'required',
        'main_points'=>'required',
        'discount_percentage'=>'required',
        'free_extra_hours'=>'required',
      
        ]);
        $loyalty_level =new loyalty_level();
        $loyalty_level->name=$request->name;
        $loyalty_level->main_points=$request->main_points;
        $loyalty_level->discount_percentage=$request->discount_percentage;
        $loyalty_level->free_extra_hours=$request->free_extra_hours;
     
        $loyalty_level->save();

        return response()->json([
            "data"=>$loyalty_level,
            "status"=>"success"
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $loyalty_level=loyalty_level::find($id);
        if($loyalty_level == null){
            return response()->json([
                "message"=>"loyalty_level no encontrado",
                "status"=>"Error"
            ],404);
        }
        return response()->json([
            "data"=>$loyalty_level,
            "status"=>"Success"
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
         $valideted = $request->validate([
        'name'=>'required',
        'main_points'=>'required',
        'discount_percentage'=>'required',
        'free_extra_hours'=>'required',
      
        ]);
       $loyalty_level = loyalty_level::find($id);
        $loyalty_level->name=$request->name;
        $loyalty_level->main_points=$request->main_points;
        $loyalty_level->discount_percentage=$request->discount_percentage;
        $loyalty_level->free_extra_hours=$request->free_extra_hours;
     
        $loyalty_level->save();

        return response()->json([
            "data"=>$loyalty_level,
            "status"=>"success"
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          $loyalty_level = loyalty_level::find($id);
        if($loyalty_level == null){
            return response()->json([
                "error"=>"Registro NO ENCONTRADO",
                "status"=>"ERROR"
            ],404);
        }
        $loyalty_level->delete();
        return response()->json([
            "status"=>"Success",
            "message"=>"Registro eliminado correctamente"
        ],204);
    }
}
