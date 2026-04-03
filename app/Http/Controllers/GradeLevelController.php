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

    //creando niveles

    public function store(Request $request)
    {
        $request->validate([
            'section_id'=> 'required|exists:sections,id',
            'name'=>'required|string|max:255',
            'order_index'=>'integer',
            'is_active'=>'boolean'
        ]);
        $gradeLevel = GradeLevel::create($request->all());
        return response()->json($gradeLevel, 201);
    }

    //mostrando nivel de grado especifico

    public function show($id)
    {
        $gradeLevel = GradeLevel::with('section')->findOrFail($id);
       return response()->json($gradeLevel);
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
        return response()->json($gradeLevel);
    }

    //eliminar un nivel de grado especifico
    public function destroy($id)
    {
        $gradeLevel =GradeLevel::findOrFail($id);
        $gradeLevel->delete();
        return response()->json(null, 204);
    }
}
