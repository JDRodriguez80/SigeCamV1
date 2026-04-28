@extends('template.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class=" card-header d-flex justify-content-between align-items-center">
                Alumnos Registrados
                <a href="{{ route('students.create') }}" class="btn btn-primary">Nuevo Alumno</a>
            </h5>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>CURP</th>
                        <th>Teléfono</th>
                        <th>Discapacidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                        <tr>
                            <td><img src="{{ $student->photo ? asset('storage/'.$student->photo): 'https://ui-avatars.com/api/?name=' . urlencode($student->first_name . ' ' . $student->last_name) . '&color=7F9CF5&background=EBF4FF'}}" class="img-thumbnail " alt="Foto del estudiante" style="max-width: 100px; max-height: 100px;"></td>
                            <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                            <td>{{ $student->curp }}</td>
                            <td>{{ $student->phone }}</td>
                           {{-- <td>
                                @if($student->status == 'activo')
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-danger">{{ ucfirst($student->status) }}</span>
                                @endif
                            </td>--}}
                             <td>{{ optional($student->disabilityType)->name ?? 'Ninguna' }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Actions">
                                <a href="{{route('students.show', $student->id)}}" class="btn btn-sm btn-primary me-2">Ver</a>
                                <a href="#" class="btn btn-sm btn-warning me-2">Editar</a>
                                <form action="{{route('students.destroy', $student->id)}}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este estudiante?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay estudiantes registrados.</td>
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
