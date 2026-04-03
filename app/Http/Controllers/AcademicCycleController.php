<?php

namespace App\Http\Controllers;

use App\Models\AcademicCycle;
use Illuminate\Http\Request;

class AcademicCycleController extends Controller
{
    public function index()
    {
        $academicCycles = AcademicCycle::all();
        return response()->json($academicCycles);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255|unique:academic_cycles,name',
            'start_date'=>'required|date',
            'end_date'=>'required|date|after:start_date',
            'cycle_cost'=>'required|numeric|min:0',
            'is_current'=>'sometimes|boolean',
            'status'=>'required|in:activo,inactivo,archivado'
        ]);
        //creando el ciclo academico
        $academicCycle=AcademicCycle::create($request->all());
        //verificando si el ciclo es el actual
        $academicCycle->is_current=$academicCycle->isCurrentCycle();
        $academicCycle->save();
        //retornar respuesta
        return response()->json($academicCycle,201);
    }

    //mostrando un ciclo especifico
    public function show($id)
    {
        //obteniendo el ciclo
        $academicCycle= AcademicCycle::findOrFail($id);
        return response()->json($academicCycle);
    }
    //editando el ciclo
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'sometimes|string|max:255|unique:academic_cycles,name',
            'start_date'=>'sometimes|date',
            'end_date'=>'sometimes|date|after:start_date',
            'cycle_cost'=>'sometimes|numeric|min:0',
            'is_current'=>'sometimes|boolean',
            'status'=>'sometimes|in:activo,inactivo,archivado'
        ]);
        //encontrando el ciclo
        $academicCycle=AcademicCycle::findOrFail($id);
        //actualizando el ciclo
        $academicCycle->update($request->all());
        //verificando si el ciclo es el actual
        $academicCycle->is_Current=$academicCycle->isCurrentCycle();
        $academicCycle->save();
        //respuesta
        return response()->json($academicCycle);

    }

    public function destroy($id)
    {
        $academicCycle=AcademicCycle::findOrFail($id);
        $academicCycle->delete();
        return response()->json(null, 204);
    }
}
