@extends('template.template')
@section('title', 'Detalles del Alumno')

@section('styles')
    <style>
        /* Estilos para el modo oscuro */
        html[data-bs-theme="dark"] .info-value {
            color: #000000 !important; /* Color de texto negro */
        }
        html[data-bs-theme="dark"] .info-label {
            color: #000000 !important; /* Un color más claro para las etiquetas en modo oscuro */
        }

        /* Estilos para el modo claro (opcional, si quieres un color específico) */
        .info-value {
            color: #212529; /* Color de texto por defecto de Bootstrap */
        }
        .info-label {
            color: #6c757d; /* Color de texto silenciado por defecto */
        }
    </style>
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Detalles del Alumno</h3>
                    <p class="text-subtitle text-muted">Información completa del estudiante</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('students.index') }}">Alumnos</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detalles</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <!-- Sección 1: Foto y Datos Básicos -->
        <section class="row">
            <div class="col-md-4">
                <div class="card bg-light shadow-sm border-0 h-100">
                    <div class="card-body d-flex flex-column align-items-center py-4">
                        <div class="mb-3" style="width: 100%; aspect-ratio: 1;">
                            <img src="{{ $student->photo ? asset('storage/'.$student->photo) : 'https://ui-avatars.com/api/?name=' . urlencode($student->first_name . ' ' . $student->last_name) . '&color=7F9CF5&background=EBF4FF' }}"
                                 class="img-fluid rounded"
                                 alt="Foto de {{ $student->first_name }}"
                                 style="width: 100%; height: 100%; object-fit: cover;">
                        </div>

                        <h5 class="text-center fw-bold mt-3 mb-2 text-dark">
                            {{ strtoupper($student->first_name . '  ' . $student->middle_name. ' '.$student->last_name . ' ' . $student->second_last_name) }}
                        </h5>

                        <div class="text-center w-100">
                            <small class="d-block mb-1" id="curp-label" style="color: #6c757d;">CURP</small>
                            <code class="text-primary" style="font-size:1.5rem ">{{ strtoupper($student->curp) }}</code>
                        </div>

                        <div class="mt-4 w-100">
                            <a href="#" class="btn btn-sm btn-warning w-100 mb-2 d-flex align-items-start justify-content-center">
                                <i class="bi bi-person-vcard"></i> Credencial
                            </a>
                            <a href="#" class="btn btn-sm btn-primary w-100 mb-2 d-flex align-items-start justify-content-center" >
                                <i class="bi bi-file-medical-fill"></i> Ficha
                            </a>
                            <a href="#" class="btn btn-sm btn-danger w-100">
                                <i class="bi bi-file-earmark-pdf-fill"></i> Documentos
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card bg-light shadow-sm border-0 mb-3">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-person-bounding-box"></i> Información Personal</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold info-label">Fecha de Nacimiento</label>
                                    <p class="h6 info-value">{{ \Carbon\Carbon::parse($student->birth_date)->format('d/m/Y') }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold info-label">Grupo Sanguíneo</label>
                                    <p class="h6 info-value">{{ strtoupper($student->blood_type) }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold info-label">Discapacidad</label>
                                    <p class="h6 info-value">{{ $student->disabilityType->name ?? 'Ninguna' }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold info-label">Inscrito desde</label>
                                    <p class="h6 info-value">{{ $student->created_at->format('d/m/Y') }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold info-label">Dirección</label>
                                    <p class="h6 info-value">{{ strtoupper($student->address) }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold info-label">Teléfono de Contacto</label>
                                    <p class="h6 info-value"><i class="fas fa-phone text-success"></i> +52 {{ $student->phone }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card bg-light shadow-sm border-0 mb-3">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0"><i class="bi bi-rulers"></i> Medidas y Tallas</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label fw-bold info-label">Peso</label>
                                <p class="h6 info-value">{{ $student->weight }} kg</p>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-bold info-label">Estatura</label>
                                <p class="h6 info-value">{{ $student->height }} cm</p>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-bold info-label">Talla Pantalón</label>
                                <p class="h6 info-value">{{ strtoupper($student->pants_size) }}</p>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-bold info-label">Talla Camisa</label>
                                <p class="h6 info-value">{{ strtoupper($student->shirt_size) }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                @if($student->notes)
                    <div class="card bg-light shadow-sm border-0">
                        <div class="card-header bg-warning">
                            <h5 class="mb-0 text-dark"><i class="bi bi-sticky-fill"></i> Observaciones</h5>
                        </div>
                        <div class="card-body">
                            <p class="h6 info-value">{{ strtoupper($student->notes) }}</p>
                        </div>
                    </div>
                @endif
            </div>
        </section>

        <!-- Sección 2: Tutores -->
        <section class="row mt-4">
            <div class="col-12">
                <h4 class="mb-3"><i class="fas fa-users"></i> Información de Tutores</h4>
            </div>

            <!-- Tutor Principal (30%) -->
            <div class="col-md-4">
                @if($mainTutor)
                    <div class="card bg-light shadow-sm border-0 h-100">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0"><i class="fas fa-user-tie"></i> Tutor Principal</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="info-value fw-bold mb-3">{{ strtoupper($mainTutor->first_name . ' ' . $mainTutor->last_name) }}</h6>

                            <div class="mb-3">
                                <label class="form-label fw-bold info-label">Relación</label>
                                <p class="h6 info-value">{{ $mainTutor->relationshipTypeName ?? 'No especificado' }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold info-label">Email</label>
                                <p class="h6 info-value" style="word-break: break-all;">{{ $mainTutor->email }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold info-label">Teléfono</label>
                                <p class="h6 info-value">+52 {{ $mainTutor->phone }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold info-label">CURP</label>
                                <p class="h6 info-value" style="font-size: 0.9rem;">{{ strtoupper($mainTutor->curp) }}</p>
                            </div>
                            <div class="mb-0">
                                <label class="form-label fw-bold info-label">Dirección</label>
                                <p class="h6 info-value" style="font-size: 0.9rem;">{{ strtoupper($mainTutor->address) }}</p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle"></i> No hay tutor principal registrado.
                    </div>
                @endif
            </div>

            <!-- Otros Tutores (70%) -->
            <div class="col-md-8">
                @if($otherTutors && $otherTutors->count() > 0)
                    <div class="card bg-light shadow-sm border-0">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0"><i class="fas fa-users"></i> Otros Tutores o Contactos</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="info-label">Nombre</th>
                                            <th class="info-label">Relación</th>
                                            <th class="info-label">Teléfono</th>
                                            <th class="info-label">Email</th>
                                            <th class="text-center info-label">Puede recoger</th>
                                            <th class="text-center info-label">Legal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($otherTutors as $tutor)
                                            @php
                                                $relationType = \App\Models\RelationshipType::find($tutor->pivot->relationship_type_id);
                                            @endphp
                                            <tr>
                                                <td class="info-value fw-bold">{{ strtoupper($tutor->first_name . ' ' . $tutor->last_name) }}</td>
                                                <td class="info-value"><span class="badge bg-info">{{ $relationType->name ?? 'N/A' }}</span></td>
                                                <td class="info-value">+52 {{ $tutor->phone }}</td>
                                                <td class="info-value">{{ $tutor->email }}</td>
                                                <td class="text-center info-value">
                                                    @if($tutor->pivot->lives_with_student)
                                                        <span class="badge bg-success"><i class="fas fa-check"></i></span>
                                                    @else
                                                        <span class="badge bg-danger"><i class="fas fa-times"></i></span>
                                                    @endif
                                                </td>
                                                <td class="text-center info-value">
                                                    @if($tutor->pivot->is_legal_guardian)
                                                        <span class="badge bg-success"><i class="fas fa-check"></i></span>
                                                    @else
                                                        <span class="badge bg-secondary"><i class="fas fa-times"></i></span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i> No hay otros tutores registrados.
                    </div>
                @endif
            </div>
        </section>
        @endsection
    </div>
