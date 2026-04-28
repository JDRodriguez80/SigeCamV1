@extends('template.template')

@section('title', 'Editar Grado')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Editar Grado</h3>
                    <p class="text-subtitle text-muted">Formulario para actualizar un grado académico.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('gradeLevels.index') }}">Grados</a></li>
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
                            <h4 class="card-title">Editando: {{ $gradeLevel->name }}</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical" method="POST" action="{{ route('gradeLevels.update', $gradeLevel->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="section_id">Sección</label>
                                                    <select class="form-select" id="section_id" name="section_id" required>
                                                        <option value="">Seleccione una sección</option>
                                                        @foreach($sections as $section)
                                                            <option value="{{ $section->id }}" {{ old('section_id', $gradeLevel->section_id) == $section->id ? 'selected' : '' }}>
                                                                {{ $section->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="name">Nombre del grado</label>
                                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $gradeLevel->name) }}" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="status">Estado</label>
                                                    <select class="form-select" id="status" name="status">
                                                        <option value="active" {{ old('status', $gradeLevel->status) == 'active' ? 'selected' : '' }}>Activo</option>
                                                        <option value="inactive" {{ old('status', $gradeLevel->status) == 'inactive' ? 'selected' : '' }}>Inactivo</option>
                                                        <option value="full" {{ old('status', $gradeLevel->status) == 'full' ? 'selected' : '' }}>Lleno</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Actualizar Grado</button>
                                                <a href="{{ route('gradeLevels.index') }}" class="btn btn-light-secondary me-1 mb-1">Cancelar</a>
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
