<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Payment;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index($studentId)
    {
        //obtener todas las facturas del estudiante
        $invoices = Invoice::whereHas('payment', function ($query) use ($studentId) {
            $query->where('student_id', $studentId);
        })->get();
        return response()->json($invoices);
    }

    public function store(Request $request)
    {
        //validando datos
        $request->validate([
            'payment_id' => 'required|exists:payments,id',
            'invoice_number' => 'required|string|max:255',
            'invoice_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        //obtener el pago
        $payment = Payment::with('student')->findOrFail($request->payment_id);
        //creando la factura
        $invoice = Invoice::create([
            'payment_id' => $request->payment_id,
            'invoice_number' => $request->invoice_number,
            'amount' => $payment->amount,
            'invoice_date' => $request->invoice_date,
            'payment_method' => $payment->payment_method,
            'notes' => $request->notes,
        ]);
        $invoice->load('payment.student');
        //retornando la factura creada
        return response()->json($invoice, 201);
    }
    //mostrar factura especifico
    public function show($id)
    {
        $invoice = Invoice::with('payment.student','payment.academicCycle')->findOrFail($id);
        return response()->json($invoice);
    }
}
