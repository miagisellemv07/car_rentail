<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = car::with(['brand'])->get();

        return response()->json([
            "data" => $cars,
            "status" => "success"
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand_id' => 'required',
            'model' => 'required',
            'year' => 'required',
            'color' => 'required',
            'license_plate' => 'required',
            'mileage' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'is_premiun' => 'required',
            'rental_count' => 'required',
            'daily_rate' => 'required',
            'status' => 'required'
        ]);

        $car = new car();
        $car->brand_id = $request->brand_id;
        $car->model = $request->model;
        $car->year = $request->year;
        $car->color = $request->color;
        $car->license_plate = $request->license_plate;
        $car->mileage = $request->mileage;
        $car->lat = $request->lat;
        $car->lng = $request->lng;
        $car->is_premiun = $request->is_premiun;
        $car->rental_count = $request->rental_count;
        $car->daily_rate = $request->daily_rate;
        $car->status = $request->status;

        $car->save();

        return response()->json([
            "data" => $car,
            "status" => "success"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = car::with(['brand'])->find($id);

        if ($car == null) {
            return response()->json([
                "message" => "car no encontrado",
                "status" => "error"
            ], 404);
        }

        return response()->json([
            "data" => $car,
            "status" => "success"
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $car = car::find($id);

        if ($car == null) {
            return response()->json([
                "message" => "car no encontrado",
                "status" => "error"
            ], 404);
        }

        $validated = $request->validate([
            'brand_id' => 'required',
            'model' => 'required',
            'year' => 'required',
            'color' => 'required',
            'license_plate' => 'required',
            'mileage' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'is_premiun' => 'required',
            'rental_count' => 'required',
            'daily_rate' => 'required',
            'status' => 'required'
        ]);

        $car->brand_id = $request->brand_id;
        $car->model = $request->model;
        $car->year = $request->year;
        $car->color = $request->color;
        $car->license_plate = $request->license_plate;
        $car->mileage = $request->mileage;
        $car->lat = $request->lat;
        $car->lng = $request->lng;
        $car->is_premiun = $request->is_premiun;
        $car->rental_count = $request->rental_count;
        $car->daily_rate = $request->daily_rate;
        $car->status = $request->status;

        $car->save();

        return response()->json([
            "data" => $car,
            "status" => "success"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = car::find($id);

        if ($car == null) {
            return response()->json([
                "message" => "car no encontrado",
                "status" => "error"
            ], 404);
        }

        $car->delete();

        return response()->json([
            "message" => "car eliminado correctamente",
            "status" => "success"
        ], 200);
    }
    //   $table->enum('status',['available','rented','maintenance','retired']);
    public function updateStatus(Request $request, string $id)
{
    $validated = $request->validate([
        'status' => 'required|in:available,rented,maintenance,inactive'
    ]);

    $car = car::find($id);

    if ($car == null) {
        return response()->json([
            "error" => "CAR NO ENCONTRADO",
            "status" => "ERROR"
        ], 404);
    }

    $car->status = $request->status;
    $car->save();

    return response()->json([
        "data" => $car,
        "message" => "Estado del carro actualizado correctamente",
        "status" => "success"
    ], 200);
}
}