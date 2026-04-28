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
                Grados Escolares
            </h5>
            <a href="{{ route('gradeLevels.create') }}" class="btn btn-primary">Nuevo Grado</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                <tr>
                    <th>Sección</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($gradeLevels as $grade)
                    <tr>
                        <td>{{ $grade->section->name }}</td>
                        <td>{{ $grade->name }}</td>
                        <td>
                            @if($grade->status == 'active')
                                <span class="badge bg-success">Activo</span>
                            @elseif($grade->status == 'inactive')
                                <span class="badge bg-danger">Inactivo</span>
                            @else
                                <span class="badge bg-warning">{{ $grade->status }}</span>
                            @endif
                        </td>
                        <td class="d-flex gap-1">
                            <a href="{{ route('gradeLevels.show', $grade->id) }}" class="btn btn-sm btn-primary">Ver</a>
                            <a href="{{ route('gradeLevels.edit', $grade->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('gradeLevels.destroy', $grade->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este grado?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No hay grados registrados.</td>
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
