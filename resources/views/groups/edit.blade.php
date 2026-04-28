@extends('template.template')

@section('title', 'Editar Grupo')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Editar Grupo</h3>
                <p class="text-subtitle text-muted">Formulario para actualizar los datos de un grupo académico.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('groups.index') }}">Grupos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Editar</li>
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
                        <h4 class="card-title">Editando Grupo: {{ $group->name }}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" method="POST" action="{{ route('groups.update', $group->id) }}">
                                @csrf
                                @method('PATCH')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="academic_cycle_id">Ciclo Académico</label>
                                                <select class="form-select" name="academic_cycle_id" required>
                                                    @foreach($academicCycles as $cycle)
                                                        <option value="{{ $cycle->id }}" {{ old('academic_cycle_id', $group->academic_cycle_id) == $cycle->id ? 'selected' : '' }}>
                                                            {{ $cycle->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="grade_level_id">Grado</label>
                                                <select class="form-select" name="grade_level_id" required>
                                                    @foreach($gradeLevels as $grade)
                                                        <option value="{{ $grade->id }}" {{ old('grade_level_id', $group->grade_level_id) == $grade->id ? 'selected' : '' }}>
                                                            {{ $grade->name }} ({{ $grade->section->name }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name">Nombre del Grupo</label>
                                                <input type="text" name="name" class="form-control" value="{{ old('name', $group->name) }}" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="shift">Turno</label>
                                                <select class="form-select" name="shift" required>
                                                    <option value="matutino" {{ old('shift', $group->shift) == 'matutino' ? 'selected' : '' }}>Matutino</option>
                                                    <option value="vespertino" {{ old('shift', $group->shift) == 'vespertino' ? 'selected' : '' }}>Vespertino</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="capacity">Capacidad</label>
                                                <input type="number" name="capacity" class="form-control" min="1" value="{{ old('capacity', $group->capacity) }}" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="status">Estado</label>
                                                <select class="form-select" name="status" required>
                                                    <option value="active" {{ old('status', $group->status) == 'active' ? 'selected' : '' }}>Activo</option>
                                                    <option value="inactive" {{ old('status', $group->status) == 'inactive' ? 'selected' : '' }}>Inactivo</option>
                                                    <option value="full" {{ old('status', $group->status) == 'full' ? 'selected' : '' }}>Lleno</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Actualizar Grupo</button>
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
