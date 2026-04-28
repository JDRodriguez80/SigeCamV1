@extends('template.template')

@section('title', 'Detalles del ciclo escolar')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Detalles del ciclo escolar</h3>
                    <p class="text-subtitle text-muted">Información completa del ciclo escolar registrado.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('academicCycles.index') }}">Ciclos</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detalles</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section>
            <div class="row">
                <div class="col-md-8 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label><strong>Nombre:</strong></label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <p>{{ $academicCycle->name }}</p>
                                </div>
                                <div class="col-md-4">
                                    <label><strong>Costo:</strong></label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <p>{{ $academicCycle->cycle_cost }}</p>
                                </div>
                                <div class="col-md-4">
                                    <label><strong>Fecha de inicio:</strong></label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <p>{{ $academicCycle->start_date }}</p>
                                </div> <div class="col-md-4">
                                    <label><strong>Fecha de fin:</strong></label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <p>{{ $academicCycle->end_date }}</p>
                                </div>
                                <div class="col-md-4">
                                    <label><strong>Estado:</strong></label>
                                </div>
                                <div class="col-md-8 form-group">
                                    @if($academicCycle->status == 'activo')
                                        <span class="badge bg-success">Activo</span>
                                    @elseif($academicCycle->status == 'archivado')
                                        <span class="badge bg-warning">Archivado</span>
                                    @else
                                        <span class="badge bg-danger">Inactivo</span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <label><strong>Fecha de Creación:</strong></label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <p>{{ $academicCycle->created_at->format('d/m/Y H:i') }}</p>
                                </div>
                            </div>
                            <div class="mt-3">
                                <a href="{{ route('academicCycles.index') }}" class="btn btn-secondary">Volver al Listado</a>
                                {{-- Aquí puedes agregar un botón para editar --}}
                                {{-- <a href="{{ route('sections.edit', $section->id) }}" class="btn btn-primary">Editar</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
