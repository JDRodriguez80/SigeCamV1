<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
     $enrollments =Enrollment::with('student','academicCycle','group')->get();
     return response()->json($enrollments);
    }
    //nueva inscripcion

    public function store(Request $request)
    {
        $request->validate([
            'student_id'=>'required|exists:student,id',
            'academic_cycle_id'=>'required|exists:academic_cycles,id',
            'group_id'=>'required|exists:groups,id',
            'enrollment_date'=>'required|date',
            'status'=>'required|in:pre_inscrito,insctrito,baja,graduado',
            'has_complementary_care'=>'boolean',
            'notes'=>'nullable|string'
        ]);

        $enrollment = Enrollment::create($request->all());
        return response()->json($enrollment, 201);
    }
    //mostrando un registro en especifico
    public function show($id)
    {
        $enrollment=Enrollment::with('student', 'academicCycle', 'group');
        return response()->json($enrollment);
    }

    //actualizar registro de inscripcion
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id'=>'required|exists:student,id',
            'academic_cycle_id'=>'required|exists:academic_cycles,id',
            'group_id'=>'required|exists:groups,id',
            'status'=>'required|in:pre_inscrito,insctrito,baja,graduado',
            'has_complementary_care'=>'boolean',
            'notes'=>'nullable|string'
        ]);
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->update($request->all());
        return response()->json($enrollment);
    }

    //eliminando registro
    public function destroy($id)
    {
        $enrollment=Enrollment::findOrFail($id);
        $enrollment->delete();

        return response()->json(null, 204);
    }
}
