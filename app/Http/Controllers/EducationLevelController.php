<?php

namespace App\Http\Controllers;

use App\Models\EducationLevels;
use Illuminate\Http\Request;

class EducationLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educationLevel=EducationLevels::all();

        return response()->json($educationLevel);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code'=>'required|string|max:8|unique:education_levels,code',
            'name'=>'required|string|max:255',
            'order_index'=>'integer'
        ]);
        $educationLevel=EducationLevels::create($request->all());
        return response()->json($educationLevel, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $educationLevel=EducationLevels::findOrFail($id);
        return response()->json($educationLevel);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'code'=>'sometimes|string|max:8|unique:education_levels,code',
            'name'=>'sometimes|string|max:255',
            'order_index'=>'sometimes|integer'
        ]);
        $educationLevel=EducationLevels::findOrFail($id);
        $educationLevel->update($request->only('code','name','order_index'));
        return response()->json($educationLevel, 201);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $educationLevel=EducationLevels::findOrFail($id);
        $educationLevel->delete();
        return response(null, 204);
    }
}
