<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**Mostrando todos los grupos**/
    public function index()
    {
        $groups = Group::with('academicCycle','section','gradeLevel','enrollments');
        return response()->json($groups);
    }
    /* creating new group*/
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'name'=>'required|max:191|string',
            'grade_level_id'=>'required|exists:grade_levels,id',
            'section_id'=>'required|exists:sections,id',
            'academic_cycle_id'=>'required|exists:academic_cycles,id',
            'shift'=>'nullable|in:matutino,vespertino',
            'capacity'=>'required|integer|min:1',
            'status'=>'required|in:active,inactive,full'
        ]);
        //creating the group
        $group =Group::create($request->all());
        return response()->json($group,201);

    }

    public function show($id)
    {
        $group=Group::with('academicCycle','section','gradeLevel','enrollments')($id);
        return response()->json($group);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'sometimes|max:191|string',
            'grade_level_id'=>'sometimes|exists:grade_levels,id',
            'section_id'=>'sometimes|exists:sections,id',
            'academic_cycle_id'=>'sometimes|exists:academic_cycles,id',
            'shift'=>'nullable|in:matutino,vespertino',
            'capacity'=>'sometimes|integer|min:1',
            'status'=>'sometimes|in:active,inactive,full'
        ]);
    }

}
