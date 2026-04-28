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
                Tipos de documentos
            </h5>
            <a href="{{ route('documentTypes.create') }}" class="btn btn-primary">Nuevo tipo de documento</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Aplica a: </th>
                    <th>Ligado a un ciclo escolar? </th>
                    <th>Es obligatorio? </th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($documentTypes as $doc)
                    <tr>
                        <td>{{ $doc->code }}</td>
                        <td>{{ $doc->name }}</td>
                        <td>{{ $doc->applies_to }}</td>
                        <td>
                            @if($doc->requires_cycles == '1')
                                <span class="badge bg-success">Si</span>
                            @else
                                <span class="badge bg-warning">No</span>
                            @endif
                        </td>
                        <td>
                            @if($doc->is_required == '1')
                                <span class="badge bg-success">Si</span>
                            @else
                                <span class="badge bg-warning">No</span>
                            @endif
                        </td>
                        <td class="d-flex gap-1">
                          {{--  <a href="{{ route('documentTypes.show', $doc->id) }}" class="btn btn-sm btn-primary">Ver</a>--}}
                            <a href="{{ route('documentTypes.edit', $doc->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('documentTypes.destroy', $doc->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este tipo de documento?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="12" class="text-center">No hay tipos registrados.</td>
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

