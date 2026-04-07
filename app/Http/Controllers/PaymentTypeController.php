<?php

namespace App\Http\Controllers;

use App\Models\Payment_type;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paymentTypes = Payment_type::all();
        return response()->json($paymentTypes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code'=>'required|string|max:50|unique:payment_types,code',
            'name'=>'required|string|max:100',
            'is_active'=>'sometimes|boolean'
        ]);

        $paymentType=Payment_type::create($request->all());
        return response()->json($paymentType, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $paymentType=Payment_type::findOrFail($id);
        return response()->json($paymentType, 200);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment_type $payment_type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'code'=>'sometimes|string|max:50',
            'name'=>'sometimes|string|max:100',
            'is_active'=>'sometimes|boolean'
        ]);
        $paymentType=Payment_type::findOrFail($id);
        $paymentType->update($request->only('code','name','is_active'));

        return response()->json($paymentType, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $paymentType=Payment_type::findOrFail($id);
        $paymentType->delete();
        return response()->json(null, 204);
    }
}
