@extends('template.template')

@section('title', 'Crear Nuevo Ciclo')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Crear Nuevo ciclo</h3>
                    <p class="text-subtitle text-muted">Formulario para registrar un nuevo ciclo escolar.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('academicCycles.index') }}">Ciclos Academicos</a></li>
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
                            <h4 class="card-title">Datos del ciclo escolar</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" method="POST" action="{{ route('academicCycles.store') }}">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="name">Nombre del ciclo</label>
                                                    <input type="text" id="name" class="form-control" name="name" placeholder="Ej: 2025-2026" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="cycle_cost">Costo del ciclo</label>
                                                    <input type="text" inputmode="decimal" id="cycle_cost" class="form-control" name="cycle_cost" placeholder="$0.00" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="start_date">Fecha de inicio</label>
                                                    <input type="date"  id="start_date" class="form-control" name="start_date"  required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="end_date">Fecha de fin</label>
                                                    <input type="date"  id="end_date" class="form-control" name="end_date"  required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="status">Estado</label>
                                                    <select class="form-select" id="status" name="status">
                                                        <option value="activo">Activo</option>
                                                        <option value="inactivo">Inactivo</option>
                                                        <option value="archivado">Archivado</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Guardar Ciclo</button>
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
