<?php

use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentRegistrationController;
use App\Http\Controllers\RelationshipTypeController;
use App\Http\Controllers\AcademicCycleController;
use App\Http\Controllers\GradeLevelController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas para Estudiantes
    Route::get('/students', [StudentController::class, 'indexWeb'])->name('students.index');
    Route::get('/students/create', [StudentRegistrationController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentRegistrationController::class, 'store'])->name('students.store');
    Route::get('/students/search/{curp}', [StudentController::class, 'searchByCurp'])->name('students.searchByCurp');
    Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
    Route::patch('/students/{id}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

    // Rutas para Secciones
    Route::get('/sections', [SectionController::class, 'indexWeb'])->name('sections.index');
    Route::get('/sections/create', [SectionController::class, 'create'])->name('sections.create');
    Route::post('/sections', [SectionController::class, 'store'])->name('sections.store');
    Route::get('/sections/{id}', [SectionController::class, 'show'])->name('sections.show');
    Route::get('/sections/{id}/edit', [SectionController::class, 'edit'])->name('sections.edit');
    Route::patch('/sections/{id}', [SectionController::class, 'update'])->name('sections.update');
    Route::delete('/sections/{id}', [SectionController::class, 'destroy'])->name('sections.destroy');

    //rutas para los tipos de relaciones
    Route::get('/relationship_types', [RelationshipTypeController::class, 'indexWeb'])->name('relationshipTypes.index');

    //rutas para ciclos escolares
    Route::get('/academic_cycles', [AcademicCycleController::class, 'indexWeb'])->name('academicCycles.index');
    Route::get('/academic_cycles/create', [AcademicCycleController::class, 'create'])->name('academicCycles.create');
    Route::post('/academic_cycles', [AcademicCycleController::class, 'store'])->name('academicCycles.store');
    Route::get('/academic_cycles/{id}', [AcademicCycleController::class, 'show'])->name('academicCycles.show');
    Route::get('/academic_cycles/{id}/edit', [AcademicCycleController::class, 'edit'])->name('academicCycles.edit');
    Route::patch('/academic_cycles/{id}', [AcademicCycleController::class, 'update'])->name('academicCycles.update');
    Route::delete('/academic_cycles/{id}', [AcademicCycleController::class, 'destroy'])->name('academicCycles.destroy');

    //rutas para los grados
    Route::get('/grade_levels', [GradeLevelController::class, 'indexWeb'])->name('gradeLevels.index');
    Route::get('/grade_levels/create', [GradeLevelController::class, 'create'])->name('gradeLevels.create');
    Route::post('/grade_levels', [GradeLevelController::class, 'store'])->name('gradeLevels.store');
    Route::get('/grade_levels/{id}', [GradeLevelController::class, 'show'])->name('gradeLevels.show');
    Route::get('/grade_levels/{id}/edit', [GradeLevelController::class, 'edit'])->name('gradeLevels.edit');
    Route::patch('/grade_levels/{id}', [GradeLevelController::class, 'update'])->name('gradeLevels.update');
    Route::delete('/grade_levels/{id}', [GradeLevelController::class, 'destroy'])->name('gradeLevels.destroy');

    //rutas para grupos
    Route::get('/groups', [GroupController::class, 'indexWeb'])->name('groups.index');
    Route::get('/groups/create', [GroupController::class, 'create'])->name('groups.create');
    Route::post('/groups', [GroupController::class, 'store'])->name('groups.store');
    Route::get('/groups/{id}', [GroupController::class, 'show'])->name('groups.show');
    Route::get('/groups/{id}/edit', [GroupController::class, 'edit'])->name('groups.edit');
    Route::patch('/groups/{id}', [GroupController::class, 'update'])->name('groups.update');
    Route::delete('/groups/{id}', [GroupController::class, 'destroy'])->name('groups.destroy');

    //rutas para los tipos de documentos
    Route::get('/document_types', [DocumentTypeController::class, 'indexWeb'])->name('documentTypes.index');
    Route::get('/document_types/create', [DocumentTypeController::class, 'create'])->name('documentTypes.create');
    Route::post('/document_types', [DocumentTypeController::class, 'store'])->name('documentTypes.store');
    Route::get('/document_types/{documentType}', [DocumentTypeController::class, 'show'])->name('documentTypes.show');
    Route::get('/document_types/{documentType}/edit', [DocumentTypeController::class, 'edit'])->name('documentTypes.edit');
    Route::patch('/document_types/{documentType}', [DocumentTypeController::class, 'update'])->name('documentTypes.update');
    Route::delete('/document_types/{documentType}', [DocumentTypeController::class, 'destroy'])->name('documentTypes.destroy');

    // Rutas para Inscripciones
    Route::get('/enrollments', [EnrollmentController::class, 'indexWeb'])->name('enrollments.index');
    Route::post('/enrollments', [EnrollmentController::class, 'store'])->name('enrollments.store');
    Route::delete('/enrollments/{id}', [EnrollmentController::class, 'destroy'])->name('enrollments.destroy');

    // Rutas para Configuración
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
});

require __DIR__.'/auth.php';
