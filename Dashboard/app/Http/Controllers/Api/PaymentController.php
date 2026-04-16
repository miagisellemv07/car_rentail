<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\payment;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $payments=payment::with(['rental'])->get();
        return response()->json([
            "data"=>$payments,
            "status"=>"success"
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valideted = $request->validate([
        'rental_id'=>'required',
        'amount'=>'required',
        'payment_method'=>'required',
        'transaction_id'=>'required',
        'status'=>'required',
        'payment_date'=>'required|date'
      
        ]);
        $payment =new payment();
        $payment->rental_id=$request->rental_id;
        $payment->payment_method=$request->payment_method;
        $payment->amount=$request->amount;
        $payment->transaction_id=$request->transaction_id;
        $payment->status=$request->status;
        $payment->payment_date=$request->payment_date;
        
    
        $payment->save();

        return response()->json([
            "data"=>$payment,
            "status"=>"success"
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $payment=payment::find($id);
        if($payment == null){
            return response()->json([
                "message"=>"payment no encontrado",
                "status"=>"Error"
            ],404);
        }
        return response()->json([
            "data"=>$payment,
            "status"=>"Success"
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $valideted = $request->validate([
        'rental_id'=>'required',
        'amount'=>'required',
        'payment_method'=>'required',
        'transaction_id'=>'required',
        'status'=>'required',
        'payment_date'=>'required|date'
      
        ]);
        $payment = payment::find($id);
        $payment->rental_id=$request->rental_id;
        $payment->payment_method=$request->payment_method;
        $payment->amount=$request->amount;
        $payment->transaction_id=$request->transaction_id;
        $payment->status=$request->status;
        $payment->payment_date=$request->payment_date;
        
    
        $payment->save();

        return response()->json([
            "data"=>$payment,
            "status"=>"success"
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $payment = payment::find($id);
        if($payment == null){
            return response()->json([
                "error"=>"Registro NO ENCONTRADO",
                "status"=>"ERROR"
            ],404);
        }
        $payment->delete();
        return response()->json([
            "status"=>"Success",
            "message"=>"Registro eliminado correctamente"
        ],204);
    }
}
