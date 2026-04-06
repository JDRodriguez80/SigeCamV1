<?php

namespace App\Http\Controllers;

use App\Models\RelationshipType;
use Illuminate\Http\Request;

class relationshipTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $relationshipType=relationshipType::all();
        return response()->json($relationshipType);
    }

    /**
     * Show the form for creating a new resource.
     *
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
        request()->validate([
            'code'=>'required|string|unique:relationship_types,code|max:55',
            'name'=>'required|string',
        ]);
        $relationshipType=relationshipType::create(request()->all());
        return response()->json($relationshipType,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $relationType=relationshipType::findOrFail($id);
        return response()->json($relationType,200);
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
        request()->validate([
            'code'=>'sometimes|string|max:55',
            'name'=>'sometimes|string',
        ]);
        $relationshipType=relationshipType::findOrFail($id);
        $relationshipType->update(request()->only('code','name'));
        return response()->json($relationshipType,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $relationshipType=relationshipType::findOrFail($id);
        $relationshipType->delete();
        return response()->json(null,204);
    }
}
