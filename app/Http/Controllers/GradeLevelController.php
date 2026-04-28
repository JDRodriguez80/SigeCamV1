<?php

namespace App\Http\Controllers;

use App\Models\GradeLevel;
use App\Models\Section;
use Illuminate\Http\Request;

class GradeLevelController extends Controller
{
    //mostrando todos los niveles de grado

    public function index()
    {
        $gradeLevels =GradeLevel::with('section')->get();
        return response()->json($gradeLevels);
    }

    public function indexWeb()
    {
        $gradeLevels = GradeLevel::with('section')->get();
        return view('gradeLevels.index', ['gradeLevels' => $gradeLevels]);
    }

    //creando niveles

    public function create()
    {
        $sections = Section::all();
        return view('gradeLevels.create', ['sections' => $sections]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'section_id'=> 'required|exists:sections,id',
            'name'=>'required|string|max:255',
            'order_index'=>'integer',
            'is_active'=>'boolean'
        ]);
        $gradeLevel = GradeLevel::create($request->all());
        if($request->wantsJson()){
            return response()->json($gradeLevel, 201);
        }
        return redirect()->route('gradeLevels.index')->with('success', 'Grado creado exitosamente.');
    }

    //mostrando nivel de grado especifico

    public function show($id)
    {
        $gradeLevel = GradeLevel::with('section')->findOrFail($id);
       if (\request()->wantsJson()){
        return response()->json($gradeLevel);
       }
       return view('gradeLevels.show', compact('gradeLevel'));
    }

    public function edit(Request $request, $id)
    {
        $gradeLevel = GradeLevel::findOrFail($id);
        $sections = Section::all();
        return view('gradeLevels.edit', compact('gradeLevel', 'sections'));
    }

    //actualizar un nivel de grado especifico
    public function update(Request $request, $id)
    {
        $request->validate([
            'section_id' => 'sometimes|exists:sections,id',
            'name' => 'sometimes|string|max:255',
            'order_index' => 'integer',
            'is_active' => 'boolean'
        ]);

        $gradeLevel = GradeLevel::findOrFail($id);
        $gradeLevel->update($request->all());
        if ($request->wantsJson()) {
            return response()->json($gradeLevel, 200);
        }
        return redirect()->route('gradeLevels.index')->with('success', 'Grado actualizado exitosamente.');
    }

    //eliminar un nivel de grado especifico
    public function destroy(Request $request, $id)
    {
        $gradeLevel =GradeLevel::findOrFail($id);
        $gradeLevel->delete();
        if ($request->wantsJson()) {
            return response()->json(null, 204);
        }
        return redirect()->route('gradeLevels.index')->with('success', 'Grado eliminado exitosamente.');
    }
}
