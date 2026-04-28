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
                Ciclos Academicos
            </h5>
            <a href="{{ route('academicCycles.create') }}" class="btn btn-primary">Nuevo Ciclo</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Costo</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha Termino</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($academicCycles as $cycle)
                    <tr>
                        <td>{{ $cycle->name }}</td>
                        <td>{{ $cycle->cycle_cost }}</td>
                        <td>{{ $cycle->start_date }}</td>
                        <td>{{ $cycle->end_date }}</td>
                        <td>
                            @if($cycle->is_current)
                                <span class="badge bg-success">Actual</span>
                            @else
                                <span class="badge bg-danger">Ciclo no actual</span>
                            @endif
                        </td>
                        <td class="d-flex gap-1">
                            <a href="{{ route('academicCycles.show', $cycle->id) }}" class="btn btn-sm btn-primary">Ver</a>
                            <a href="{{ route('academicCycles.edit', $cycle->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('academicCycles.destroy', $cycle->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este ciclo?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No hay ciclos registrados.</td>
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
