<?php

use App\Http\Controllers\GuardianController;
use App\Http\Controllers\relationshipTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SectionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\GradeLevelController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\AcademicCycleController;
use App\Http\Controllers\EducationLevelController;
use App\Http\Controllers\DisabilityTypeController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentRegistrationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\invoiceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//login
Route::post('register', [AuthController::class, 'register']);
Route::post('login',[AuthController::class, 'login']);
Route::post('logout',[AuthController::class, 'logout'])->middleware('auth:sanctum');
//rutas de listado no autenticadas
Route::get('/gradeLevel/',[GradeLevelController::class,'index']);
Route::get('/section/', [SectionController::class, 'index']);

//rutas autenticadas
Route::middleware('auth:sanctum')->group(function(){

    //rutas para ciclos academicos
    Route::get('/academicCycle/',[AcademicCycleController::class,'index']);
    Route::post('/academicCycle/',[AcademicCycleController::class, 'store']);
    Route::get('/academicCycle/{id}',[AcademicCycleController::class, 'show']);
    Route::put('/academicCycle/{id}',[AcademicCycleController::class, 'update']);
    Route::delete('/academicCycle/{id}',[AcademicCycleController::class, 'destroy']);

    // Rutas para los tipos de discapacidad
    Route::get('/disabilityTypes', [DisabilityTypeController::class, 'index']);
    Route::post('/disabilityTypes', [DisabilityTypeController::class, 'store']);
    Route::put('/disabilityTypes/{id}', [DisabilityTypeController::class, 'update']);
    Route::get('/disabilityTypes/{id}', [DisabilityTypeController::class, 'show']);
    Route::delete('/disabilityTypes/{id}', [DisabilityTypeController::class, 'destroy']);

    //rutas para tipo de documentos
    Route::get('/documentType/',[DocumentTypeController::class, 'index']);
    Route::get('/documentType/{id}',[DocumentTypeController::class, 'show']);
    Route::post('/documentType/',[DocumentTypeController::class, 'store']);
    Route::put('/documentType/{id}',[DocumentTypeController::class, 'update']);
    Route::delete('/documentType/{id}',[DocumentTypeController::class, 'destroy']);

    //rutas para escolaridad de los padres
    Route::get('/educationLevel/',[EducationLevelController::class, 'index']);
    Route::post('/educationLevel/',[EducationLevelController::class, 'store']);
    Route::get('/educationLevel/{id}',[EducationLevelController::class, 'show']);
    Route::put('/educationLevel/{id}',[EducationLevelController::class, 'update']);
    Route::delete('/educationLevel/{id}',[EducationLevelController::class, 'destroy']);

    //rutas para inscripciones
    Route::get('/enrollments', [EnrollmentController::class, 'index']);
    Route::post('/enrollments', [EnrollmentController::class, 'store']);
    Route::get('/enrollments/{id}', [EnrollmentController::class, 'show']);
    Route::put('/enrollments/{id}', [EnrollmentController::class, 'update']);
    Route::delete('/enrollments/{id}', [EnrollmentController::class, 'destroy']);

    //rutas para grados
    Route::post('/gradeLevel/',[GradeLevelController::class,'store']);
    Route::put('/gradeLevel/{id}', [GradeLevelController::class, 'update']);
    Route::get('/gradeLevel/{id}',[GradeLevelController::class, 'show']);
    Route::delete('/gradeLevel/{id}',[GradeLevelController::class, 'destroy']);

    //rutas para grupos
    Route::get('/group/list', [GroupController::class, 'index']);
    Route::post('/group/', [GroupController::class, 'store']);
    Route::get('/group/{id}', [GroupController::class, 'show']);
    Route::put('/group/updateGroup', [GroupController::class, 'update']);
    Route::delete('/group/delete',[GroupController::class,'destroy']);

    //rutas para guardians
    Route::get('/guardians/',[GuardianController::class, 'index']);
    Route::post('/guardians/',[GuardianController::class, 'store']);
    Route::put('/guardians/{id}',[GuardianController::class, 'update']);
    Route::get('/guardians/{id}',[GuardianController::class, 'show']);
    Route::delete('/guardians/{id}',[GuardianController::class, 'destroy']);

    //rutas para invoices
    Route::post('/invoices', [InvoiceController::class, 'store']);
    Route::get('/invoices/{id}', [InvoiceController::class, 'show']);
    Route::get('/invoices/student/{studentId}', [InvoiceController::class, 'index']);

    //rutas para pagos
    Route::get('/payments/{studentId}', [PaymentController::class, 'index']);
    Route::post('/payments', [PaymentController::class, 'store']);
    Route::get('/payments/{id}', [PaymentController::class, 'show']);
    Route::put('/payments/{id}', [PaymentController::class, 'update']);
    Route::delete('/payments/{id}', [PaymentController::class, 'destroy']);

    //rutas para tipo de pagos
    Route::get('/paymentType/',[PaymentTypeController::class, 'index']);
    Route::post('/paymentType/',[PaymentTypeController::class, 'store']);
    Route::put('/paymentType/{id}',[PaymentTypeController::class, 'update']);
    Route::get('/paymentType/{id}',[PaymentTypeController::class, 'show']);
    Route::delete('/paymentType/{id}',[PaymentTypeController::class, 'destroy']);

    //rutas para secciones
    Route::post('/section/', [SectionController::class,'store']);
    Route::put('/section/{id}', [SectionController::class, 'update']);
    Route::get('/section/{id}',[SectionController::class, 'show']);
    Route::delete('/section/delete/{id}',[SectionController::class, 'destroy']);

    //rutas para students
    Route::get('/students/',[StudentController::class, 'index']);
    Route::post('/students/',[StudentController::class, 'store']);
    Route::get('/students/{id}',[StudentController::class, 'show']);
    Route::put('/students/{id}',[StudentController::class, 'update']);
    Route::delete('/students/{id}',[StudentController::class, 'destroy']);
    //rutas para registro
    Route::post('/students/register',[StudentRegistrationController::class, 'store']);

    //rutas para tipos de relacion
    Route::get('/relationshipType/',[RelationshipTypeController::class,'index']);
    Route::post('/relationshipType/',[RelationshipTypeController::class,'store']);
    Route::get('/relationshipType/{id}',[RelationshipTypeController::class,'show']);
    Route::put('/relationshipType/{id}', [RelationshipTypeController::class, 'update']);
    Route::delete('/relationshipType/{id}',[RelationshipTypeController::class, 'destroy']);

});
