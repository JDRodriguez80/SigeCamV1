<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use App\Models\Guardian;
use App\Models\Student;
use Illuminate\Http\Request;
class DocumentController extends Controller
{
    public function store(Request $request, $entityId, $entityType)
    {
        //validar solicitud
        $request->validate([
            'document_type_id' => 'required|exists:document_types,id',
            'file'=>'required|file|mimes:pdf,jpeg,png,jpg,doc,docx|max:2048']);

        //encontrando el estudiante al que pertenecen los documentos
      if($entityType=='student'){
          $entity=Student::findOrFail($entityId);
      }elseif ($entityType=='guardian'){
          $entity=Guardian::findOrFail($entityId);
      }else{
          if($request->wantsJson()){
              return response()->json(['message' => 'entidad no valida'], 400);
          }
          return view('404');
      }

        //subir el archivo
        $file = $request->file('file');
        $path = $request->store('public/documents');

        //creando el documento
        $document = Documents::create([
           'documentable_type' => ucfirst($entityType),
           'documentable_id' => $entity->id,
           'document_type_id' => $request->input('document_type_id'),
            'uploaded_by' => auth()->id(),
            'disk' => 'public',
            'path' => $path,
            'original_name' => $file->getClientOriginalName(),
            'mime_type' => $file->getMimeType(),
            'extension' => $file->getExtension(),
            'size' => $file->getSize(),
            'is_current' => 1,
            'issued_at' => now(),
            'expires_at' => null,
            'notes' => $request->notes
        ]);
        if ($request->wantsJson()){
            return response()->json($document,201);
        }
        return redirect()->route('students.show',$entity->id);
        //TODO pensar en la logica para el retorno de la vista correcta
    }

    public function show(Request $request, $entityId, $entityType)
    {
        // verificando si solicitamos los documentos de un estudiante o de un tutor
        if($entityType=='student'){
            $entity=Student::findOrFail($entityId);
        }elseif ($entityType=='guardian'){
            $entity=Guardian::findOrFail($entityId);
        }else{
            if($request->wantsJson()){
                return response()->json(['message' => 'entidad no valida'], 400);
            }
            return view('404');
        }
        return view('students.show', compact('entity'));

    }
}

