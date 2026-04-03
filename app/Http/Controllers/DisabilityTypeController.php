<?php

namespace App\Http\Controllers;

use App\Models\DisabilityType;
use Illuminate\Http\Request;

class DisabilityTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $disability=DisabilityType::all();
        return response()->json($disability);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code'=>'string|required|unique:disability_types,code|max:8',
            'name'=>'string|required|max:255',
            'description'=>'string',
            'is_active'=>'boolean'
,        ]);
        $disability=DisabilityType::create($request->all());
        return response()->json($disability, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $disability=DisabilityType::findOrFail($id);
        return response()->json($disability);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'code'=>'string|sometimes|max:8',
            'name'=>'string|sometimes|max:255',
            'description'=>'string',
            'is_active'=>'boolean'
            ]);
        $disability=DisabilityType::findOrFail($id);
        $disability->update($request->only('code','name','description','is_active'));
        return response()->json($disability, 201);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $disability=DisabilityType::findOrFail($id);
        $disability->delete();
        return response(null, 204);
    }
}
