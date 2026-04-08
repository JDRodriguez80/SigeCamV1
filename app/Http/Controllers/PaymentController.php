<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index($studentId)
    {
        $payments = Payment::where('student_id', $studentId)
        ->with('academicCycle','paymentType')->get();
        return response()->json($payments);
    }
    /*Registrar pago*/

    public function store(Request $request)
    {
        request()->validate([
            'student_id'=>'required|exists:students,id',
            'academic_cycle_id'=>'required|exists:academic_cycles,id',
            'payment_type_id'=>'required|exists:payment_types,id',
            'amount'=>'required|numeric|min:0',
            'payment_date'=>'required|date',
            'remaining_balance'=>'nullable|numeric|min:0',
            'discount'=>'nullable|numeric|min:0',
            'is_full_payment'=>'required|boolean'
        ]);
        //creando el pago
       $payment=Payment::create([
           'student_id'=>$request->student_id,
           'academic_cycle_id'=>$request->academic_cycle_id,
           'payment_type_id'=>$request->payment_type_id,
           'amount'=>$request->amount,
           'payment_date'=>$request->payment_date,
           'remaining_balance'=>$request->remaining_balance ?? 0,
           'discount'=>$request->discount ?? 0,
           'is_full_payment'=>$request->is_full_payment,
       ]);
       //retornando el pago creado
       return response()->json($payment->load('student','paymentType','academicCycle'), 201);
    }

    public function show($id)
    {
        //recuperacion del pago especifico
        $payment = Payment::with('student','academicCycle', 'paymentType')->findOrFail($id);
        return response()->json($payment->load('student','paymentType','academicCycle'));
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'status'=>'required|in:completo,pendiente,parcial',
            'amount'=>'required|numeric|min:0',
        ]);
        //recuperacion del pago especifico
        $payment = Payment::findOrFail($id);
        //actualizacion del pago
        $payment->update($request->only('status','amount'));
        //retornando el pago actualizado
        return response()->json($payment);

    }
    public function destroy($id)
    {
        $payment=Payment::findOrFail($id);
        $payment->delete();
        return response(null, 204);
    }
}
