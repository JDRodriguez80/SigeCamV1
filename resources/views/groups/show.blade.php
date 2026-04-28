@extends('template.template')

@section('title', 'Detalles del Grupo')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detalles del Grupo</h3>
                <p class="text-subtitle text-muted">Información completa del grupo y sus alumnos inscritos.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('groups.index') }}">Grupos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detalles</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Tarjeta de Detalles del Grupo --}}
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Datos del Grupo</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Nombre:</strong> {{ $group->name }}</p>
                        <p><strong>Grado:</strong> {{ $group->gradeLevel->name }}</p>
                        <p><strong>Sección:</strong> {{ $group->gradeLevel->section->name }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Ciclo Académico:</strong> {{ $group->academicCycle->name }}</p>
                        <p><strong>Turno:</strong> {{ ucfirst($group->shift) }}</p>
                        <p><strong>Capacidad:</strong> {{ $group->enrollments->count() }} / {{ $group->capacity }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tarjeta de Alumnos Inscritos --}}
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Alumnos Inscritos</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>CURP</th>
                            <th>Género</th>
                            <th>Discapacidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($group->enrollments as $enrollment)
                            <tr>
                                <td>
                                    @if($enrollment->student->photo)
                                        <img src="{{ asset('storage/' . $enrollment->student->photo) }}" alt="Foto" width="50" class="rounded-circle">
                                    @else
                                        <img src="{{ asset('assets/static/images/faces/2.jpg') }}" alt="Avatar" width="50" class="rounded-circle">
                                    @endif
                                </td>
                                <td>{{ $enrollment->student->first_name }} {{ $enrollment->student->middle_name }}</td>
                                <td>{{ $enrollment->student->last_name }} {{ $enrollment->student->second_last_name }}</td>
                                <td>{{ $enrollment->student->curp }}</td>
                                <td>{{ ucfirst($enrollment->student->gender) }}</td>
                                <td>{{ $enrollment->student->disabilityType->name ?? 'N/A' }}</td>
                                <td>
                                    <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres quitar a este alumno del grupo?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Quitar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No hay alumnos inscritos en este grupo.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <a href="{{ route('groups.index') }}" class="btn btn-secondary">Volver al Listado</a>
    </section>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/simple-datatables.js') }}"></script>
@endsection
