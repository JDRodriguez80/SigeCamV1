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

    public function indexWeb()
    {
        $docs=DocumentType::all();
        return view('documentType.index', ['documentTypes' => $docs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('documentType.create');
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
            'requires_cycle'=>'boolean',
            'is_required'=>'boolean'
        ]);

        $docType= DocumentType::create($request->all());
       if ($request->wantsJson()) {
           return response()->json($docType, 201);
       }
       return redirect()->route('documentTypes.index')->with('success', 'Tipo de documento creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $docType= DocumentType::findOrFail($id);

        if ($request->wantsJson()) {
            return response()->json($docType);
        }
        return view('documentType.show', compact('docType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocumentType $documentType)
    {
        return view('documentType.edit', compact('documentType'));
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
            'is_required'=>'boolean',
            'requires_cycles'=>'boolean'
        ]);
        $docType=DocumentType::findOrFail($id);
        $docType->update($request->only('code','name','aplies_to','requires_cycles','is_required'));
        if ($request->wantsJson()) {
            return response()->json($docType);
        }
        return redirect()->route('documentTypes.index')->with('success', 'Tipo de documento actualizado exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $docType=DocumentType::findOrFail($id);
        $docType->delete();

        if ($request->wantsJson()) {
            return response(null, 204);
        }
        return redirect()->route('documentTypes.index')->with('success', 'Tipo de documento eliminado exitosamente.');
    }
}
