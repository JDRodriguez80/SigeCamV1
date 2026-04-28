@extends('template.template')

@section('title', 'Editar tipo de documento')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Editar Tipo de documento</h3>
                    <p class="text-subtitle text-muted">Formulario para actualizar el tipo de documento.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('documentTypes.index') }}">Tipo de documento</a></li>
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
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" method="POST" action="{{ route('documentTypes.update', $documentType->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="code">Codigo del tipo de documento </label>
                                                    <input type="text" id="code" class="form-control" name="code" value="{{ old('code', $documentType->code) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="name">Nombre del tipo de documento </label>
                                                    <input type="text" id="name" class="form-control" name="name" value="{{ old('name', $documentType->name) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="applies_to">Aplica a: </label>
                                                    <input type="text" id="applies_to" class="form-control" name="applies_to" value="{{ old('applies_to', $documentType->applies_to) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="requires_cycles">Ligado a ciclo Escolar?</label>
                                                    <select class="form-select" id="requires_cycles" name="requires_cycles">
                                                        <option value="1" {{ old('requires_cycles', $documentType->requires_cycles) == 1 ? 'selected' : '' }}>Si</option>
                                                        <option value="0" {{ old('requires_cycles', $documentType->requires_cycles) == 0 ? 'selected' : '' }}>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="is_required">Es Obligatorio?</label>
                                                    <select class="form-select" id="is_required" name="is_required">
                                                        <option value="1" {{ old('is_required', $documentType->is_required) == 1 ? 'selected' : '' }}>Si</option>
                                                        <option value="0" {{ old('is_required', $documentType->is_required) == 0 ? 'selected' : '' }}>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Actualizar Tipo de Documento</button>
                                                <a href="{{ route('documentTypes.index') }}" class="btn btn-light-secondary me-1 mb-1">Cancelar</a>
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
