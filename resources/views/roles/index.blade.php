@extends('template.template')
@section('title', 'Detalles de los roles')
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
                    Roles del sistema
                </h5>
                <a href="{{ route('roles.create') }}" class="btn btn-primary">Nuevo rol</a>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha de creacion</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->created_at }}</td>
                            <td class="d-flex gap-1">
                                <a href="{{route('roles.edit',$role->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{route('roles.destroy',$role->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este rol?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay roles registrados.</td>
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
