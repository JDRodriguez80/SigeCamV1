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
                Tipos de relaciones
            </h5>
            <a href="{{--{{ route('relationship_types.create') }}--}}" class="btn btn-primary">Nueva relacion</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($relationshipTypes as $relation)
                    <tr>
                        <td>{{ $relation->name }}</td>
                        <td class="d-flex gap-1">
                            <a href="{{--{{ route('sections.show', $relation->id) }}--}}" class="btn btn-sm btn-primary">Ver</a>
                            <a href="{{--{{ route('sections.edit', $relation->id) }}--}}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{--{{ route('sections.destroy', $relation->id) }}--}}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta sección?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No hay secciones registradas.</td>
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
