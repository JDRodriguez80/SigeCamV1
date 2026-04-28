@extends('template.template')

@section('title', 'Crear Nuevo Grupo')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Crear Nuevo Grupo</h3>
                <p class="text-subtitle text-muted">Formulario para registrar un nuevo grupo académico.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('groups.index') }}">Grupos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Crear</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Datos del Grupo</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" method="POST" action="{{ route('groups.store') }}">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="academic_cycle_id">Ciclo Académico</label>
                                                <select class="form-select" name="academic_cycle_id" required>
                                                    <option value="">Seleccione un ciclo</option>
                                                    @foreach($academicCycles as $cycle)
                                                        <option value="{{ $cycle->id }}">{{ $cycle->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="grade_level_id">Grado</label>
                                                <select class="form-select" name="grade_level_id" required>
                                                    <option value="">Seleccione un grado</option>
                                                    @foreach($gradeLevels as $grade)
                                                        <option value="{{ $grade->id }}">{{ $grade->name }} ({{ $grade->section->name }})</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name">Nombre del Grupo (Ej: 'A', 'B')</label>
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Nombre o identificador del grupo" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="shift">Turno</label>
                                                <select class="form-select" name="shift" required>
                                                    <option value="">Seleccione un turno</option>
                                                    <option value="matutino">Matutino</option>
                                                    <option value="vespertino">Vespertino</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="capacity">Capacidad</label>
                                                <input type="number" name="capacity" class="form-control" min="1" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="status">Estado</label>
                                                <select class="form-select" name="status" required>
                                                    <option value="active">Activo</option>
                                                    <option value="inactive">Inactivo</option>
                                                    <option value="full">Lleno</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Guardar Grupo</button>
                                            <a href="{{ route('groups.index') }}" class="btn btn-light-secondary me-1 mb-1">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
