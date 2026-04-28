<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Section;
use App\Models\GradeLevel;
use App\Models\AcademicCycle;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::with('academicCycle', 'gradeLevel.section', 'enrollments')->get();
        return response()->json($groups);
    }

    public function indexWeb()
    {
        $groups = Group::with('academicCycle', 'gradeLevel.section', 'enrollments')->get();
        return view('groups.index', ['groups' => $groups]);
    }

    public function create()
    {
        $sections = Section::all();
        $gradeLevels = GradeLevel::with('section')->get();
        $academicCycles = AcademicCycle::all();
        return view('groups.create', ['sections' => $sections, 'gradeLevels' => $gradeLevels, 'academicCycles' => $academicCycles]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required|max:191|string',
            'grade_level_id'=>'required|exists:grade_levels,id',
            'academic_cycle_id'=>'required|exists:academic_cycles,id',
            'shift'=>'nullable|in:matutino,vespertino',
            'capacity'=>'required|integer|min:1',
            'status'=>'required|in:active,inactive,full'
        ]);

        $group = Group::create($validatedData);
        if ($request->wantsJson()) {
            return response()->json($group, 201);
        }
        return redirect()->route('groups.index')->with('success', 'Grupo creado exitosamente.');
    }

    public function show(Request $request, $id)
    {
        $group = Group::with('academicCycle', 'gradeLevel.section', 'enrollments.student.disabilityType')->findOrFail($id);

        if ($request->wantsJson()){
            return response()->json($group);
        }

        return view('groups.show', compact('group'));
    }

    public function edit($id)
    {
        $group = Group::findOrFail($id);
        $sections = Section::all();
        $gradeLevels = GradeLevel::with('section')->get();
        $academicCycles = AcademicCycle::all();
        return view('groups.edit', ['group' => $group, 'sections' => $sections, 'gradeLevels' => $gradeLevels, 'academicCycles' => $academicCycles]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'=>'sometimes|max:191|string',
            'grade_level_id'=>'sometimes|exists:grade_levels,id',
            'academic_cycle_id'=>'sometimes|exists:academic_cycles,id',
            'shift'=>'nullable|in:matutino,vespertino',
            'capacity'=>'sometimes|integer|min:1',
            'status'=>'sometimes|in:active,inactive,full'
        ]);

        $group = Group::findOrFail($id);
        $group->update($validatedData);

        if ($request->wantsJson()) {
            return response()->json($group);
        }

        return redirect()->route('groups.index')->with('success', 'Grupo actualizado exitosamente.');
    }

    public function destroy(Request $request, $id)
    {
        $group = Group::findOrFail($id);
        $group->delete();

        if ($request->wantsJson()) {
            return response()->json(null, 204);
        }

        return redirect()->route('groups.index')->with('success', 'Grupo eliminado exitosamente.');
    }
}
