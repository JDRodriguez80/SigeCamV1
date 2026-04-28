@extends('template.template')

@section('title', 'Configuración del Sistema')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Configuración General</h3>
                <p class="text-subtitle text-muted">Personaliza la apariencia y el comportamiento del sistema.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Configuración</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Logo del Sistema</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Logo Actual</h5>
                            @if(isset($settings['logo']))
                                <img src="{{ asset('storage/' . $settings['logo']) }}" alt="Logo Actual" class="img-thumbnail" style="max-width: 200px; background-color: #f8f9fa;">
                            @else
                                <p>No se ha subido ningún logo.</p>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="logo">Subir Nuevo Logo</label>
                                <p class="text-muted">Se recomienda un archivo PNG o SVG con fondo transparente.</p>
                                <input type="file" id="logo" name="logo" class="form-control" accept="image/png, image/jpeg, image/svg+xml">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
