<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = brand::all();

        return response()->json([
            "data" => $brands,
            "status" => "success"
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'img' => 'required|string'
        ]);

        $brand = new brand();
        $brand->name = $request->name;
        $brand->img = $request->img;

        $brand->save();

        return response()->json([
            "data" => $brand,
            "status" => "success"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = brand::find($id);

        if ($brand == null) {
            return response()->json([
                "message" => "brand no encontrado",
                "status" => "error"
            ], 404);
        }

        return response()->json([
            "data" => $brand,
            "status" => "success"
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brand = brand::find($id);

        if ($brand == null) {
            return response()->json([
                "message" => "brand no encontrado",
                "status" => "error"
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string',
            'img' => 'required|string'
        ]);

        $brand->name = $request->name;
        $brand->img = $request->img;

        $brand->save();

        return response()->json([
            "data" => $brand,
            "status" => "success"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = brand::find($id);

        if ($brand == null) {
            return response()->json([
                "message" => "brand no encontrado",
                "status" => "error"
            ], 404);
        }

        $brand->delete();

        return response()->json([
            "message" => "brand eliminado correctamente",
            "status" => "success"
        ], 200);
    }
}