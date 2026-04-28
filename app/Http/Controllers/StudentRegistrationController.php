<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use App\Models\Student;
use App\Models\RelationshipType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class StudentRegistrationController extends Controller
{
    public function create()
    {
        $relationshipTypes = RelationshipType::all();
        $disabilityTypes = \App\Models\DisabilityType::all();
        return view('students.create', [
            'relationshipTypes' => $relationshipTypes,
            'disabilityTypes' => $disabilityTypes
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student.first_name' => 'required|string|max:255',
            'student.last_name' => 'required|string|max:255',
            'student.middle_name' => 'nullable|string|max:255',
            'student.second_last_name' => 'nullable|string|max:255',
            'student.curp' => 'required|string|max:255|unique:students,curp',
            'student.gender' => 'required|in:masculino,femenino',
            'student.birth_date' => 'required|date',
            'student.birth_place' => 'required|string|max:255',
            'student.address' => 'required|string',
            'student.phone' => 'required|string|max:50',
            'student.disability_type_id' => 'nullable|exists:disability_types,id',
            'student.blood_type' => 'required|string|max:10',
            'student.origin_school' => 'nullable|string|max:255',
            'student.pants_size' => 'required|string|max:50',
            'student.shirt_size' => 'required|string|max:50',
            'student.shoe_size' => 'required|string|max:50',
            'student.weight' => 'required|numeric|min:0',
            'student.height' => 'required|numeric|min:0',
            'student.status' => ['required', Rule::in(['activo', 'inactivo', 'graduado', 'baja'])],
            'student.notes' => 'nullable|string',
            'student.photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            'guardians' => 'required|array|min:1|max:4',
            'guardians.*.curp' => 'required|string|max:255',
            'guardians.*.first_name' => 'required|string|max:255',
            'guardians.*.last_name' => 'required|string|max:255',
            'guardians.*.middle_name' => 'nullable|string|max:255',
            'guardians.*.second_last_name' => 'nullable|string|max:255',
            'guardians.*.birth_date' => 'required|date',
            'guardians.*.occupation' => 'required|string|max:255',
            'guardians.*.phone' => 'required|string|max:50',
            'guardians.*.email' => 'nullable|email|max:255',
            'guardians.*.address' => 'nullable|string',
            'guardians.*.relationship_type_id' => 'required|exists:relationship_types,id',
            'guardians.*.is_primary_contact' => 'nullable|boolean',
            'guardians.*.is_legal_guardian' => 'nullable|boolean',
            'guardians.*.lives_with_student' => 'nullable|boolean',
            'guardians.*.notes' => 'nullable|string',
        ]);

        $primaryContacts = collect($request->guardians)->where('is_primary_contact', true)->count();
        if ($primaryContacts > 1 && $request->wantsJson()) {
            return response()->json(['message' => 'No puede haber más de un contacto principal.'], 422);
        }

        $studentData = $validatedData['student'];

        if ($request->hasFile('student.photo')) {
            $path = $request->file('student.photo')->store('student_photos', 'public');
            $studentData['photo'] = $path;
        }

        $student = DB::transaction(function () use ($studentData, $request) {
            $student = Student::create($studentData);

            foreach ($request->guardians as $guardianData) {
                $guardian = Guardian::firstOrCreate(
                  ['curp' => $guardianData['curp']],
                  [
                      'first_name' => $guardianData['first_name'],
                      'last_name' => $guardianData['last_name'],
                      'middle_name' => $guardianData['middle_name'] ?? null,
                      'second_last_name' => $guardianData['second_last_name'] ?? null,
                      'birth_date' => $guardianData['birth_date'],
                      'occupation' => $guardianData['occupation'],
                      'phone' => $guardianData['phone'],
                      'email' => $guardianData['email'] ?? null,
                      'address' => $guardianData['address'] ?? null,
                  ]
                );
                $student->guardians()->attach($guardian->id, [
                    'relationship_type_id' => $guardianData['relationship_type_id'],
                    'is_legal_guardian' => $guardianData['is_legal_guardian'] ?? false,
                    'is_primary_contact' => $guardianData['is_primary_contact'] ?? false,
                    'lives_with_student' => $guardianData['lives_with_student'] ?? false,
                    'notes' => $guardianData['notes'] ?? null,
                ]);
            }
            return $student->load('guardians');
        });

        if ($request->wantsJson()) {
            return response()->json($student, 201);
        }

        return redirect()->route('students.index')->with('success', 'Estudiante registrado exitosamente.');
    }
}
