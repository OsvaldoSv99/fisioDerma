@extends('layouts.layout')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Pacientes</h2>
                    <a href="{{route('nuevo_paciente')}}">
                        <i class='bx bx-folder-plus' style="font-size:4rem"></i>
                    </a>
                </div>
                <div class="card-body">

                    <table id="tabla" class="table table-striped">
                        <thead>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">CURP</th>
                            <th class="text-center">Domicilio</th>
                            <th class="text-center">Teléfono</th>
                            <th class="text-center">Contacto</th>
                            <th class="text-center">Teléfono Contacto</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acciones</th>
                        </thead>
                        <tbody>
                            @foreach ($pacientes as $p)
                                <tr>
                                    <td>{{$p->nombre .' '. $p->apellido_paterno .' '. $p->apellido_materno}}</td>
                                    <td>{{$p->curp}}</td>
                                    <td>{{$p->domicilio}}</td>
                                    <td>{{$p->telefono}}</td>
                                    <td>{{$p->contacto_nombre}}</td>
                                    <td>{{$p->contacto_telefono}}</td>
                                    <td>{{$p->activo == 1? 'Activo' : 'Inactivo'}}</td>
                                    <td>
                                        <a href="{{url('editar_paciente/'.$p->id_paciente)}}" class="btn btn-sm boton_estilo">Editar</a>
                                        <a href="{{url('recetas/'.$p->id_paciente)}}" class="btn btn-sm boton_estilo mt-3">Recetas</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

