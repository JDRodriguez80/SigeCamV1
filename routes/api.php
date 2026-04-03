<?php

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
    Route::get('/disabilityTypes', [DisabilityTypeController::class, 'index']);  // Obtener todos los tipos de discapacidad
    Route::post('/disabilityTypes', [DisabilityTypeController::class, 'store']); // Crear un nuevo tipo de discapacidad
    Route::put('/disabilityTypes/{id}', [DisabilityTypeController::class, 'update']); // Actualizar un tipo de discapacidad
    Route::get('/disabilityTypes/{id}', [DisabilityTypeController::class, 'show']); // Actualizar un tipo de discapacidad
    Route::delete('/disabilityTypes/{id}', [DisabilityTypeController::class, 'destroy']); // Eliminar un tipo de discapacidad

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
    Route::post('/enrollments/t',[EnrollmentController::class, 'index']);
    Route::post('/enrollments/newEnrollment', [EnrollmentController::class, 'store']);

    //rutas para grados
    Route::post('/gradeLevel/',[GradeLevelController::class,'store']);
    Route::put('/gradeLevel/{id}', [GradeLevelController::class, 'update']);
    Route::get('/gradeLevel/{id}',[GradeLevelController::class, 'show']);
    Route::delete('/gradeLevel/{id}',[GradeLevelController::class, 'destroy']);


    //rutas para grupos
    Route::post('/group/list', [GroupController::class, 'index']);
    Route::post('/group/', [GroupController::class, 'store']);
    Route::put('/group/updateGroup', [GroupController::class, 'update']);
    Route::delete('/group/delete',[GroupController::class,'destroy']);

    //rutas para secciones
    Route::post('/section/', [SectionController::class,'store']);
    Route::put('/section/{id}', [SectionController::class, 'update']);
    Route::get('/section/{id}',[SectionController::class, 'show']);
    Route::delete('/section/delete/{id}',[SectionController::class, 'destroy']);

    //rutas para tipos de relacion
    Route::get('/relationshipType/',[RelationshipTypeController::class,'index']);
    Route::post('/relationshipType/',[RelationshipTypeController::class,'store']);
    Route::get('/relationshipType/{id}',[RelationshipTypeController::class,'show']);
    Route::put('/relationshipType/{id}', [RelationshipTypeController::class, 'update']);
    Route::delete('/relationshipType/{id}',[RelationshipTypeController::class, 'destroy']);


});
