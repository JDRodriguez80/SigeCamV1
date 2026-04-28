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

    public function indexWeb()
    {
        $academicCycles =AcademicCycle::all();
        return view('academicCycles.index', ['academicCycles' => $academicCycles]);
    }

    public function create()
    {
        return view('academicCycles.create');
    }

    public function edit($id)
    {
        $academicCycle=AcademicCycle::findOrFail($id);
        return view('academicCycles.edit', ['academicCycle' => $academicCycle]);
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

        $academicCycle=AcademicCycle::create($request->all());
        $academicCycle->is_current=$academicCycle->isCurrentCycle();
        $academicCycle->save();

        if ($request->wantsJson()){
            return response()->json($academicCycle,201);
        }
        return redirect()->route('academicCycles.index')->with('success', 'Ciclo creado exitosamente.');
    }

    public function show(Request $request, $id)
    {
        $academicCycle= AcademicCycle::findOrFail($id);

        if ($request->wantsJson()){
            return response()->json($academicCycle);
        }
        return view('academicCycles.show', compact('academicCycle'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'=>'sometimes|string|max:255|unique:academic_cycles,name,'.$id,
            'start_date'=>'sometimes|date',
            'end_date'=>'sometimes|date|after:start_date',
            'cycle_cost'=>'sometimes|numeric|min:0',
            'status'=>'sometimes|in:activo,inactivo,archivado'
        ]);

        $academicCycle=AcademicCycle::findOrFail($id);
        $academicCycle->update($validatedData);

        $academicCycle->is_current=$academicCycle->isCurrentCycle();
        $academicCycle->save();

        if ($request->wantsJson()) {
            return response()->json($academicCycle);
        }

        return redirect()->route('academicCycles.index')->with('success', 'Ciclo actualizado exitosamente.');
    }

    public function destroy(Request $request, $id)
    {
        $academicCycle=AcademicCycle::findOrFail($id);
        $academicCycle->delete();
        if ($request->wantsJson()) {
            return response()->json(null, 204);
        }
        return redirect()->route('academicCycles.index')->with('success', 'Ciclo eliminado exitosamente.');
    }
}
