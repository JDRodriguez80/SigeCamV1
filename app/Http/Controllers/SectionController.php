<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    // ... (tus métodos existentes: index, indexWeb, create, store, etc.)
    public function index()
    {
        $sections= Section::all();
        return response()->json($sections);
    }

    public function indexWeb()
    {   $sections = Section::all();
        return view('sections.index', ['sections' => $sections]);
    }

    public function create()
    {
        return view('sections.create');
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
        if ($request->wantsJson()) {
            return response()->json($section);
        }
        return redirect()->route('sections.index')->with('success', 'Sección creada exitosamente.');

    }

    //mostrar seccion especifica

    public function show(Request $request, $id)
    {
        $section = Section::findOrFail($id);
        if ($request->wantsJson()) {
            return response()->json($section);
        }
        return view('sections.show', compact('section'));
    }

    public function edit($id)
    {
        $section = Section::findOrFail($id);
        return view('sections.edit', compact('section'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'code'=> 'sometimes|string|max:50|unique:sections,code,' . $id,
            'name'=>'sometimes|string|max:100',
            'is_active'=>'sometimes|string'
        ]);

        $validatedData['is_active'] = $request->has('is_active');

        $section = Section::findOrFail($id);
        $section->update($validatedData);

        if ($request->wantsJson()) {
            return response()->json($section);
        }

        return redirect()->route('sections.index')->with('success', 'Sección actualizada exitosamente.');
    }

    public function destroy(Request $request, $id)
    {
        $section = Section::findOrFail($id);
        $section->delete();

        if ($request->wantsJson()) {
            return response()->json(null, 204);
        }

        return redirect()->route('sections.index')->with('success', 'Sección eliminada exitosamente.');
    }
}
