@extends('template.template')

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">
                Grupos
            </h5>
            <a href="{{ route('groups.create') }}" class="btn btn-primary">Nuevo Grupo</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                <tr>
                    <th>Ciclo Escolar</th>
                    <th>Sección</th>
                    <th>Grado</th>
                    <th>Nombre</th>
                    <th>Turno</th>
                    <th>Capacidad</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($groups as $group)
                    <tr>
                        <td>{{ $group->academicCycle->name }}</td>
                        <td>{{ $group->gradeLevel->section->name }}</td>
                        <td>{{ $group->gradeLevel->name }}</td>
                        <td>{{ $group->name }}</td>
                        <td>{{ $group->shift }}</td>
                        <td>{{ $group->capacity }}</td>
                        <td>
                            @if($group->status == 'active')
                                <span class="badge bg-success">Activo</span>
                            @elseif($group->status == 'inactive')
                                <span class="badge bg-danger">Inactivo</span>
                            @else
                                <span class="badge bg-warning">Lleno</span>
                            @endif
                        </td>
                        <td class="d-flex gap-1">
                            <a href="{{ route('groups.show', $group->id) }}" class="btn btn-sm btn-primary">Ver</a>
                            <a href="{{ route('groups.edit', $group->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('groups.destroy', $group->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este grupo?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">No hay grupos registrados.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- JS for dataTables --}}
    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/simple-datatables.js') }}"></script>
@endsection
