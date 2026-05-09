<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Group;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::with('student', 'academicCycle', 'group')->get();
        return response()->json($enrollments);
    }

    public function indexWeb()
    {
        $groups = Group::with('academicCycle', 'gradeLevel.section')->get();
        return view('enrollments.index', ['groups' => $groups]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|exists:students,id',
            'academic_cycle_id' => 'required|exists:academic_cycles,id',
            'group_id' => 'required|exists:groups,id',
            'enrollment_date' => 'required|date',
            'status' => 'required|in:pre_inscrito,inscrito,baja,graduado,repetidor',
            'has_complementary_care' => 'boolean',
            'notes' => 'nullable|string'
        ]);

        // Lógica de validación de duplicidad
        $existingEnrollment = Enrollment::where('student_id', $validatedData['student_id'])
                                        ->where('academic_cycle_id', $validatedData['academic_cycle_id'])
                                        ->first();

        if ($existingEnrollment) {
            $message = 'El alumno ya está inscrito en un grupo para este ciclo escolar.';
            if ($request->wantsJson()) {
                return response()->json(['message' => $message], 409); // 409 Conflict
            }
            return redirect()->back()->withErrors(['enrollment' => $message])->withInput();
        }

        $enrollment = Enrollment::create($validatedData);

        if ($request->wantsJson()) {
            return response()->json($enrollment, 201);
        }

        return redirect()->route('enrollments.index')->with('success', '¡Alumno inscrito exitosamente!');
    }

    public function show($id)
    {
        $enrollment = Enrollment::with('student', 'academicCycle', 'group')->findOrFail($id);
        return response()->json($enrollment);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|exists:students,id',
            'academic_cycle_id' => 'required|exists:academic_cycles,id',
            'group_id' => 'required|exists:groups,id',
            'status' => 'required|in:pre_inscrito,inscrito,baja,graduado,repetidor',
            'has_complementary_care' => 'boolean',
            'notes' => 'nullable|string'
        ]);

        // Lógica de validación de duplicidad para update (si el alumno cambia de grupo en el mismo ciclo)
        $existingEnrollment = Enrollment::where('student_id', $validatedData['student_id'])
                                        ->where('academic_cycle_id', $validatedData['academic_cycle_id'])
                                        ->where('id', '!=', $id) // Excluir la inscripción actual
                                        ->first();

        if ($existingEnrollment) {
            $message = 'El alumno ya está inscrito en un grupo para este ciclo escolar.';
            if ($request->wantsJson()) {
                return response()->json(['message' => $message], 409); // 409 Conflict
            }
            return redirect()->back()->withErrors(['enrollment' => $message])->withInput();
        }

        $enrollment = Enrollment::findOrFail($id);
        $enrollment->update($validatedData);

        if ($request->wantsJson()) {
            return response()->json($enrollment);
        }

        return redirect()->route('enrollments.index')->with('success', 'Inscripción actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->delete();

        if (request()->wantsJson()) {
            return response()->json(null, 204);
        }

        return redirect()->route('enrollments.index')->with('success', 'Inscripción eliminada exitosamente.');
    }
}
