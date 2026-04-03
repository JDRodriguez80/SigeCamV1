<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $sections= Section::all();
        return response()->json($sections);
    }

    //crear nueva seccion

    public function store(Request $request)
    {
        $request->validate([
            'code'=>'required|string|max:50|unique:sections,code',
            'name'=>'required|string|max:100',
            'is_active'=>'boolean'
        ]);
        $section= Section::create($request->all());
        return response()->json($section, 201);
    }

    //mostrar seccion especifica

    public function show($id)
    {
        $section = Section::findOrFail($id);
        return response()->json($section);
    }
    /*Actualizar seccion en especifico*/
    public function update(Request $request, $id)
    {
        $request->validate([
            'code'=> 'sometimes|string|max:50|unique:sections,code,' . $id,
            'name'=>'sometimes|string|max:100',
            'is_active'=>'sometimes|boolean'
        ]);
        $section = Section::findOrFail($id);
        $section->update($request->only('code','name', 'is_active'));
        return response()->json($section);
    }

    //eliminar registro

    public function destroy($id)
    {
        $section = Section::findOrFail($id);
        $section->delete();

        return response()->json(null, 204);
    }
}
