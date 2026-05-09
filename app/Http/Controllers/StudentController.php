<?php

namespace App\Http\Controllers;
use App\Models\RelationshipType;
use App\Models\StudentGuardian;
use App\Models\DisabilityType;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('guardians', 'payments', 'documents', 'disabilityType')->get();
        return response()->json($students, 200);
    }

    public function indexWeb()
    {
        $students = Student::with('guardians','payments','documents', 'disabilityType')->get();
        return view('students.index', ['students' => $students]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name'         => 'required|string|max:255',
            'last_name'          => 'required|string|max:255',
            'middle_name'        => 'nullable|string|max:255',
            'second_last_name'   => 'nullable|string|max:255',
            'curp'               => 'required|string|max:255|unique:students,curp',
            'gender'=> 'required|in:masculino,femenino',
            'birth_date'         => 'required|date',
            'birth_place'        => 'required|string|max:255',
            'address'            => 'required|string',
            'phone'              => 'required|string|max:50',
            'disability_type_id' => 'nullable|exists:disability_types,id',
            'blood_type'         => 'required|string|max:10',
            'origin_school'      => 'nullable|string|max:255',
            'pants_size'         => 'required|string|max:50',
            'shirt_size'         => 'required|string|max:50',
            'shoe_size'          => 'required|string|max:50',
            'weight'             => 'required|numeric|min:0',
            'height'             => 'required|numeric|min:0',
            'status'             => ['required', Rule::in(['activo', 'inactivo', 'graduado', 'baja'])],
            'notes'              => 'nullable|string',
        ]);
        $student = Student::create($request->only([
            'first_name',
            'last_name',
            'second_last_name',
            'curp',
            'birth_date',
            'birth_place',
            'address',
            'phone',
            'blood_type',
            'disability_type_id',
            'origin_school',
            'pants_size',
            'shirt_size',
            'shoe_size',
            'weight',
            'height',
            'status',
            'notes'
        ]));
        return response()->json($student, 201);
    }

    public function show(Request $request, $id)
    {
        $student = Student::with(['guardians' => function($query) {
                $query->withPivot('relationship_type_id', 'is_legal_guardian', 'is_primary_contact', 'lives_with_student', 'notes')
                ->using(StudentGuardian::class);
            }, 'disabilityType'])->findOrFail($id);

            // Obtener el tutor principal
            $mainTutor = $student->guardians()
                ->wherePivot('is_primary_contact', 1)->using(StudentGuardian::class)
                ->first();

            // Cargar el tipo de relación
            if ($mainTutor) {
                $relationshipType = RelationshipType::find($mainTutor->pivot->relationship_type_id);
                $mainTutor->relationshipTypeName = $relationshipType ? $relationshipType->name : 'No especificado';
            }

            //gettin non main guardians
            $otherTutors =$student->guardians()->wherePivot('is_primary_contact', 0)->get();
            $disability = DisabilityType::all();

            if ($request->wantsJson()){
                return response()->json($student, 200);
            }

            return view('students.show', ['student' => $student, 'mainTutor' => $mainTutor, 'otherTutors' => $otherTutors,  'disability' => $disability]);
        }

    public function edit(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        if ($request->wantsJson()){
            $student = Student::with('guardians')->findOrFail($id);
            return response()->json($student);
        }
        return view('students.edit', compact( 'student') );
    }
    public function update(Request $request, $id)
    {
        $request->validate([
                'first_name'         => 'sometimes|string|max:255',
                'last_name'          => 'sometimes|string|max:255',
                'middle_name'        => 'nullable|string|max:255',
                'second_last_name'   => 'nullable|string|max:255',
                'curp'               => 'sometimes|string|max:255|unique:students,curp,' . $id,
                'birth_date'         => 'sometimes|date',
                'birth_place'        => 'sometimes|string|max:255',
                'address'            => 'sometimes|string',
                'phone'              => 'sometimes|string|max:50',
                'disability_type_id' => 'nullable|exists:disability_types,id',
                'blood_type'         => 'sometimes|string|max:10',
                'origin_school'      => 'nullable|string|max:255',
                'pants_size'         => 'sometimes|string|max:50',
                'shirt_size'         => 'sometimes|string|max:50',
                'shoe_size'          => 'sometimes|string|max:50',
                'weight'             => 'sometimes|numeric|min:0',
                'height'             => 'sometimes|numeric|min:0',
                'status'             => ['sometimes', Rule::in(['activo', 'inactivo', 'graduado', 'baja'])],
                'notes'              => 'nullable|string'
        ]);
        $student = Student::findOrFail($id);
        $student->update($request->only([
            'first_name',
            'last_name',
            'second_last_name',
            'curp',
            'birth_date',
            'birth_place',
            'address',
            'phone',
            'blood_type',
            'disability_type_id',
            'origin_school',
            'pants_size',
            'shirt_size',
            'shoe_size',
            'weight',
            'height',
            'status',
            'notes'
        ]));
        return response()->json($student, 200);
    }

    public function destroy(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        if ($request->wantsJson() || $request->is('api/*')) {
            return response(null, 204);
        }

        return redirect()->route('students.index')->with('success', 'Estudiante eliminado exitosamente.');
    }

    /**
     * Busca un estudiante por su CURP, eliminando espacios en blanco.
     */
    public function searchByCurp($curp)
    {
        // Limpiar el CURP de espacios en blanco al principio y al final
        $cleanedCurp = trim($curp);

        $student = Student::where('curp', $cleanedCurp)->first();

        if ($student) {
            return response()->json($student);
        }

        return response()->json(['message' => 'Estudiante no encontrado'], 404);
    }
}
