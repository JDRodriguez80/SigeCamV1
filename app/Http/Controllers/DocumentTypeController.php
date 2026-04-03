<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class DocumentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docs=DocumentType::all();
        return response()->json($docs);
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
            'code'=>'string|unique:document_types,code|required',
            'name'=>'string|required',
            'applies_to'=>'string',
            'requires_cycles'=>'boolean'
        ]);
        $docType= DocumentType::create($request->all());
        return response()->json($docType, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $docType= DocumentType::findOrFail($id);
        return response()->json($docType);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocumentType $documentType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'code'=>'string',
            'name'=>'string|sometimes',
            'applies_to'=>'string',
            'requires_cycles'=>'boolean'
        ]);
        $docType=DocumentType::findOrFail($id);
        $docType->update($request->only('code','name','aplies_to','requires_cycles'));
        return response()->json($docType);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $docType=DocumentType::findOrFail($id);
        $docType->delete();
        return response(null, 204);
    }
}
