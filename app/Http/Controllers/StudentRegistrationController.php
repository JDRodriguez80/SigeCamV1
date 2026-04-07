<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentRegistrationController extends Controller
{
    /*Registrando a un nuevo estudiante con sus responsables*/
    public function store(Request $request)
    {
        //validar los datos
        request()->validate([
            'student.first_name' => 'required|string|max:255',
            'student.last_name' => 'required|string|max:255',
            'student.middle_name' => 'nullable|string|max:255',
            'student.second_last_name' => 'nullable|string|max:255',
            'student.curp' => 'required|string|max:255|unique:students,curp',
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

            'guardians' => 'required|array|min:1|max:4', // Mínimo un responsable
            'guardians.*.first_name' => 'required|string|max:255',
            'guardians.*.last_name' => 'required|string|max:255',
            'guardians.*.middle_name' => 'nullable|string|max:255',
            'guardians.*.second_last_name' => 'nullable|string|max:255',
            'guardians.*.curp' => 'required|string|max:255',
            'guardians.*.birth_date' => 'required|date',
            'guardians.*.education_level_id' => 'nullable|exists:education_levels,id',
            'guardians.*.occupation' => 'required|string|max:255',
            'guardians.*.phone' => 'required|string|max:50',
            'guardians.*.email' => 'nullable|email|max:255',
            'guardians.*.address' => 'nullable|string',
            'guardians.*.relationship_type_id' => 'required|exists:relationship_types,id',
            'guardians.*.is_legal_guardian' => 'required|boolean',
            'guardians.*.is_primary_contact' => 'required|boolean',
            'guardians.*.lives_with_student' => 'nullable|boolean',
            'guardians.*.priority_order' => 'required|integer|min:1|max:4',
            'guardians.*.notes' => 'nullable|string',
        ]);
        //verificando de un solo responsable principal o primario
        $primaryContacts = collect(request('guardians'))->where('is_primary_contact', true)->count();

        if ($primaryContacts !== 1) {
            return response()->json([
                'message' => 'Debe tener un solo responsable principal o primario.',
            ], 422);
        }

        //verificando que no haya repetidos en priority order
        $priorityOrder = collect($request->guardians)->pluck('priority_order');
        if($priorityOrder->count() !== $priorityOrder->unique()->count()){
            return response()->json([
               'message' => 'El tutor prioritario no se puede repetir.'
            ], 422);
        }
        //verificacion de responsables duplicados verificando por curp
        $guardiansCurp= collect($request->guardians)->pluck('curp');
        if($guardiansCurp->count() !== $guardiansCurp->unique()->count()){
            return response()->json([
                'message' => 'Este responsable ya se encuentra registrado.'
            ], 422);
        }
        //transaccion para registrar el estudiante
        $student = DB::transaction(function () use ($request) {
            //crear al estudiante
            $student =Student::create($request->input('student'));

            //creamos al responsable o se reutiliza de existir
            foreach ($request->guardians as $guardianData) {
                $guardian = Guardian::firstOrCreate(
                  ['curp' => $guardianData['curp']],
                  [
                      'first_name' => $guardianData['first_name'],
                      'last_name' => $guardianData['last_name'],
                      'middle_name' => $guardianData['middle_name'] ?? null,
                      'second_last_name' => $guardianData['second_last_name'] ?? null,
                      'birth_date' => $guardianData['birth_date'],
                      'education_level_id' => $guardianData['education_level_id'] ?? null,
                      'occupation' => $guardianData['occupation'],
                      'phone' => $guardianData['phone'],
                      'email' => $guardianData['email'] ?? null,
                      'address' => $guardianData['address'] ?? null,
                  ]
                );
                //vincular el responsable al estudiante
                $student->guardians->attach($guardian->id, [
                    'first_name' => $guardianData['first_name'],
                    'last_name' => $guardianData['last_name'],
                    'middle_name' => $guardianData['middle_name'] ?? null,
                    'second_last_name' => $guardianData['second_last_name'] ?? null,
                    'birth_date' => $guardianData['birth_date'],
                    'education_level_id' => $guardianData['education_level_id'] ?? null,
                    'occupation' => $guardianData['occupation'],
                    'phone' => $guardianData['phone'],
                    'email' => $guardianData['email'] ?? null,
                    'address' => $guardianData['address'] ?? null,
                ]);
            }
            return $student->load('guardians');
        });
        return response()->json($student, 201);
    }
}
