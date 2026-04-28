@extends('template.template')
@section('title', 'Detalles de la Sección')
    @section('content')
        @section('content_header')
            <div class="col-md-12 d-flex align-items-center ">
                <div class="col-md-3 ">

                </div>
                <div class="col-md-6 d-flex justify-content-center">
                    <h1><b>{{--{{strtoupper($configuracion->nombre)}}--}} </b></h1>
                </div>
                <div class="col-md-3 d-flex justify-content-end">
                    <img class="" src="{{--{{url($configuracion->logo)}}--}}" alt="" style="height: 100px; width: 100px;">
                </div>
            </div>
        @stop

        @section('content')
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-navy border-primary">
                        <div class="card-header">
                            <div class="col justify-content-center">
                                <h3><b>Datos Registrados </b></h3>
                            </div>
                            <div class="card-tools">

                                <div class="col">

                                    <a href="{{--{{url('/admin/estudiantes/nuevos')}}--}}" class="btn btn-success">Volver</a>
                                </div>

                            </div>
                        </div>
                        {{-- Ejemplo --}}
                        <div class="row">
                            <div class="col-12 col-md-4 d-flex align-items-stretch flex-column">
                                <div class="card bg-light d-flex flex-fill">
                                    <div class="card-header text-muted border-bottom-0">
                                        Alumno(a):
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="lead"><b>{{strtoupper($student->first_name.' '.$student->last_name)}}</b></h2>
                                                <br>
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Direccion: {{strtoupper($student->address)}}</li>
                                                    <br>
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Telefono de contacto: + 52 {{$student->phone}}</li>
                                                </ul>
                                            </div>
                                            <div class="col-5 text-center">
                                                <img src="{{url($student->photo)}}" alt="user-avatar" class="img-circle img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-8 d-flex align-items-stretch flex-column">
                                <div class="card bg-light d-flex flex-fill">
                                    <div class="card-header text-muted border-bottom-0">
                                        <p></p>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-7">
                                                <p><h5><b>CURP: </b>{{strtoupper($student->curp)}}</h5></p>
                                                <p style="display: none">{{$time= strtotime($student->birth_date)}}</p>
                                                <p style="display: none">{{$newformat= date('d-m-Y')}}</p>
                                                <p><h5><b>FDN: </b>{{$newformat}}</h5></p> {{--TODO cambiar el formato a dd/mm/aaaa --}}
                                                <p><h5><b>Discapacidad: </b>{{strtoupper($student->disability_type)}}</h5></p>
                                                <p><h5><b>Grupo Sanguineo: </b>{{strtoupper($student->blood_type)}}</h5></p5
                                                <p><h5><b>Inscrito desde: </b>{{strtoupper($student->created_at->format('d/m/Y'))}}</h5></p>{{-- TODO cambiar el formato a dd/mm/aaaa y eliminar horario --}}

                                            </div>
                                            <div class="col-5 align-items-start">
                                                <p><h5><b>Peso: </b>{{strtoupper($student->weight).' '.'kg'}}</h5></p>
                                                <p><h5><b>Estatura: </b>{{strtoupper($student->height).' '.'cms'}}</h5></p>
                                                <p><h5><b>Talla de Pantalon: </b>{{strtoupper($student->pants_size)}}</h5></p>
                                                <p><h5><b>Talla de camisa/blusa: </b>{{strtoupper($student->shirt_size)}}</h5></p>
                                                <p><h5><b>Talla de zapato: </b>{{strtoupper($student->shoe_size)}}</h5></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p><h5><b>Observaciones: </b>{{strtoupper($student->notes)}}</h5></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <a href="#" class="btn btn-sm bg-teal"><i class="fas fa-id-card"></i> Credencial</a>
                                            <a href="{{--{{url('student/ficha/'.$student->id)}}--}}" class="btn btn-sm  btn-primary"><i class="fas fa-file-invoice"></i> Ficha</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 d-flex align-items-center ">
                                <div class="col-md">
                                    <h3><b>Información de los padres o tutores legales </b></h3>
                                </div>
                            </div>
                        </div>
                        {{--<div class="row">
                        @foreach ($estudiante->ppffs as $ppff)

                            <div class="col-12 col-md-3 d-flex align-items-stretch flex-column">
                                <div class="card bg-light d-flex flex-fill">
                                    <div class="card-body pt-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p><h5><b>Nombres: </b>{{strtoupper($ppff->nombres)}}</h5></p>
                                                    <p><h5><b>Apellidos: </b>{{strtoupper($ppff->apellidos)}}</h5></p>
                                                    <p><h5><b>CURP: </b>{{strtoupper($ppff->curp)}}</h5></p><p>
                                                    <h5><b>RFC: </b>{{strtoupper($ppff->rfc)}}</h5></p>
                                                    <p style="display: none">{{$time= strtotime($ppff->fecha_nacimiento)}}</p>
                                                    <p style="display: none">{{$newformat= date('d-m-Y')}}</p>
                                                    <p><h5><b>FDN: </b>{{$newformat}}</h5></p> --}}{{--TODO cambiar el formato a dd/mm/aaaa --}}{{--
                                                    <p><h5><b>Telefono: </b>{{strtoupper($ppff->telefono)}}</h5></p>
                                                    <p><h5><b>Ocupacion: </b>{{strtoupper($ppff->ocupacion)}}</h5></p5
                                                    <p><h5><b>Escolaridad: </b>{{strtoupper($ppff->escolaridad)}}</h5></p>--}}{{-- TODO cambiar el formato a dd/mm/aaaa y eliminar horario --}}{{--
                                                    <p><h5><b>Direccion: </b>{{strtoupper($ppff->direccion)}}</h5></p>
                                                    <p><h5><b>Relacion: </b>{{strtoupper($ppff->pivot->parentesco)}}</h5></p>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        @endforeach--}}
                        <div class="row">
                            {{--@foreach ($estudiante->ppffs as $ppff)
                                <div class="col-12 col-md-4">
                                    <!-- Card para cada ppff -->
                                    <div class="card card-success card-outline">
                                        <div class="card-header">
                                            <h5 class="card-title">{{ strtoupper($ppff->nombres) }} {{ strtoupper($ppff->apellidos) }}</h5>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-unstyled">
                                                <li><strong>CURP:</strong> {{ strtoupper($ppff->curp) }}</li>
                                                <li><strong>RFC:</strong> {{ strtoupper($ppff->rfc) }}</li>
                                                <li><strong>FDN:</strong>{{$newformat}}</li>
                                                <li><strong>Teléfono:</strong> {{ strtoupper($ppff->telefono) }}</li>
                                                <li><strong>Ocupación:</strong> {{ strtoupper($ppff->ocupacion) }}</li>
                                                <li><strong>Escolaridad:</strong> {{ strtoupper($ppff->escolaridad) }}</li>
                                                <li><strong>Dirección:</strong> {{ strtoupper($ppff->direccion) }}</li>
                                                <li><strong>Relación:</strong> {{ strtoupper($ppff->pivot->parentesco) }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach--}}
                        </div>

                    </div>

                    {{--Termina ejemplo --}}
                    {{-- <div class="card-body ">
                         <div class="mb-4 d-flex align-items-baseline justify-content-between">

                             <img class="m-2" src="--}}{{--{{asset('/storage/'.$student->photo)}}--}}{{--" width="225px" height="250px" alt="Fotografia del alumno" style="float:right; border-style: solid; border-spacing: 2px; border-color:#AB0033; border-image-outset: 2px; ">
                             <h1 style="color: maroon; font-size: 45px; " class="align-items-baseline justify-content-end">--}}{{--{{strtoupper($student->names)}} {{/*strtoupper($student->fLastName)*/}}  {{/*strtoupper($student->sLastName)*/}}--}}{{--</h1>
                         </div>
                         <div class="row mb-4">
                             <div class="col-md-3 form-group">
                                 <i class="fas fa-id-card"></i>
                                 <p><b>CURP: </b>{{strtoupper($estudiante->curp)}}</p>
                             </div>
                             <div class="col-md-3 form-group">
                                 <label for="" class="form-label">Fecha de Nacimiento</label>
                                 <input type="date" class="form-control" value="--}}{{--{{/*$student->dob*/}}--}}{{--" disabled>
                             </div>
                             <div class="col-md-2 form-group">
                                 <label for="" class="form-label">Genero</label>
                                 <input type="text" class="form-control" value="--}}{{--{{/*$student->gender*/}}--}}{{--" disabled>
                             </div>
                             <div class="col-md-2 form-group">
                                 <label for="" class="form-label">Grupo Sanguineo</label>
                                 <input type="text" class="form-control" value="--}}{{--{{/*$student->bloodType*/}}--}}{{--" disabled>
                             </div>
                             <div class="col-md-2 form-group">
                                 <label for="" class="form-label">Grupo</label>
                                 <input type="text" class="form-control" value="--}}{{--{{/*$student->group->name*/}}--}}{{--" disabled>
                             </div>
                         </div>
                         <div class="row mb-4">
                             <div class="col-md-6 form-group">
                                 <label for="" class="form-label">Direccion</label>
                                 <textarea class="form-control" disabled style="resize: none">--}}{{--{{/*$student->address*/}}--}}{{--</textarea>
                             </div>
                             <div class="col-md-6 form-group">
                                 <label for="" class="form-label">Telefono</label>
                                 <input type="text" class="form-control" value="--}}{{--{{/*$student->phone*/}}--}}{{--" disabled>
                             </div>
                         </div>
                         <div class="row mb-4">
                             <div class="col-md-2 form-group">
                                 <label for="" class="form-label">Estatura</label>
                                 <input type="text" class="form-control" value="--}}{{--{{/*$student->height*/}}--}}{{--" disabled>

                             </div>
                             <div class="col-md-2 form-group">
                                 <label for="" class="form-label">Peso</label>
                                 <input type="text" class="form-control" value="--}}{{--{{/*$student->weight*/}}--}}{{--" disabled>

                             </div>
                             <div class="col-md-2 form-group">
                                 <label for="" class="form-label">Genero</label>
                                 <input type="text" class="form-control" value="--}}{{--{{/*$student->gender*/}}--}}{{--" disabled>
                             </div>
                             <div class="col-md-2 form-group">
                                 <label for="" class="form-label">Talla de Zapato</label>
                                 <input type="text" class="form-control" value="--}}{{--{{/*$student->shoeSize*/}}--}}{{--" disabled>
                             </div>
                             <div class="col-md-2 form-group">
                                 <label for="" class="form-label">Talla de Camisa</label>
                                 <input type="text" class="form-control" value="--}}{{--{{/*$student->shirtSize*/}}--}}{{--" disabled>
                             </div>
                             <div class="col-md-2 form-group">
                                 <label for="" class="form-label">Discapacidad</label>
                                 <input type="text" class="form-control" value="--}}{{--{{/*$student->disability*/}}--}}{{--" disabled>
                             </div>
                         </div>

                     </div>--}}
                </div>
            </div>
        @stop
    @endsection
