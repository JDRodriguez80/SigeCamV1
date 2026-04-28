@extends('template.template')

@section('title', 'Editar Ciclo')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Editar Ciclo</h3>
                    <p class="text-subtitle text-muted">Formulario para actualizar los datos de un ciclo escolar.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('academicCycles.index') }}">Ciclo Escolar</a></li>
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
                            <h4 class="card-title">Editando: {{ $academicCycle->name }}</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" method="POST" action="{{ route('academicCycles.update', $academicCycle->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="name">Nombre del ciclo </label>
                                                    <input type="text" id="name" class="form-control" name="name" value="{{ old('name', $academicCycle->name) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="cycle_cost">Costo del ciclo</label>
                                                    <input type="text" inputmode="decimal" id="cycle_cost" class="form-control" name="cycle_cost" value="{{ old('cycle_cost', $academicCycle->cycle_cost) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="start_date">Fecha de inicio</label>
                                                    <input type="date"  id="start_date" class="form-control" name="start_date" value="{{ old('start_date', $academicCycle->start_date) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="end_date">Fecha de fin</label>
                                                    <input type="date"  id="end_date" class="form-control" name="end_date" value="{{ old('end_date', $academicCycle->end_date) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="status">Estado</label>
                                                    <select class="form-select" id="status" name="status">
                                                        <option value="activo" {{ old('status', $academicCycle->status) == 'activo' ? 'selected' : '' }}>Activo</option>
                                                        <option value="inactivo" {{ old('status',$academicCycle->status)== 'inactivo' ? 'selected': ''}}>Inactivo</option>
                                                        <option value="archivado" {{ old('status', $academicCycle->status) == 'archivado' ? 'selected' : '' }}>Archivado</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Actualizar Ciclo</button>
                                                <a href="{{ route('academicCycles.index') }}" class="btn btn-light-secondary me-1 mb-1">Cancelar</a>
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
