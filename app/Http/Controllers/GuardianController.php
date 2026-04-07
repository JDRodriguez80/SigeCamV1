<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use Illuminate\Http\Request;

class GuardianController extends Controller
{
    public function index()
    {
        $guardians=Guardian::with('students','educationLevel')->get();
        return response($guardians, 200);
    }

    public function store(Request $request)
    {
       $request->validate([
           'first_name'         => 'required|string|max:255',
           'last_name'          => 'required|string|max:255',
           'middle_name'        => 'nullable|string|max:255',
           'second_last_name'   => 'nullable|string|max:255',
           'curp'               => 'required|string|max:255|unique:guardians,curp',
           'birth_date'         => 'required|date',
           'education_level_id' => 'nullable|exists:education_levels,id',
           'occupation'         => 'required|string|max:255',
           'phone'              => 'required|string|max:50',
           'email'              => 'nullable|email|max:255',
           'address'            => 'nullable|string',
       ]);
       $guiardian = Guardian::create($request->only([
           'first_name',
           'last_name',
           'middle_name',
           'second_last_name',
           'curp',
           'birth_date',
           'education_level_id',
           'occupation',
           'phone',
           'email',
           'address',
       ]));
       return response($guiardian, 201);
    }

    public function show($id)
    {
        $guardian = Guardian::with('students', 'documents', 'educationLevel')->findOrFail($id);
        return response($guardian, 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name'         => 'sometimes|string|max:255',
            'last_name'          => 'sometimes|string|max:255',
            'middle_name'        => 'nullable|string|max:255',
            'second_last_name'   => 'nullable|string|max:255',
            'curp'               => 'sometimes|string|max:255|unique:guardians,curp,' . $id,
            'birth_date'         => 'sometimes|date',
            'education_level_id' => 'nullable|exists:education_levels,id',
            'occupation'         => 'sometimes|string|max:255',
            'phone'              => 'sometimes|string|max:50'
        ]);
        $guardian = Guardian::findOrFail($id);
        $guardian->update($request->only([
            'first_name',
            'last_name',
            'middle_name',
            'second_last_name',
            'curp',
            'birth_date',
            'education_level_id',
            'occupation',
        ]));
        return response($guardian, 200);
    }
    public function destroy($id)
    {
        $guardian = Guardian::findOrFail($id);
        $guardian->delete();
        return response(null, 204);
    }

}
