@extends('template.template')

@section('title', 'Editar Sección')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Editar Sección</h3>
                <p class="text-subtitle text-muted">Formulario para actualizar los datos de una sección académica.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('sections.index') }}">Secciones</a></li>
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
                        <h4 class="card-title">Editando: {{ $section->name }}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" method="POST" action="{{ route('sections.update', $section->id) }}">
                                @csrf
                                @method('PATCH')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="code">Código de la Sección</label>
                                                <input type="text" id="code" class="form-control" name="code" value="{{ old('code', $section->code) }}" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name">Nombre de la Sección</label>
                                                <input type="text" id="name" class="form-control" name="name" value="{{ old('name', $section->name) }}" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="is_active">Estado</label>
                                                <select class="form-select" id="is_active" name="is_active">
                                                    <option value="1" {{ old('is_active', $section->is_active) == 1 ? 'selected' : '' }}>Activa</option>
                                                    <option value="0" {{ old('is_active', $section->is_active) == 0 ? 'selected' : '' }}>Inactiva</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Actualizar Sección</button>
                                            <a href="{{ route('sections.index') }}" class="btn btn-light-secondary me-1 mb-1">Cancelar</a>
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
