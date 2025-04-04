@extends('layouts.layout')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Recetas</h1>
                    <h4>{{$paciente->nombre .' '. $paciente->apellido_paterno .' '. $paciente->apellido_materno}}</h4>
                    <a href="{{url('nueva_receta',$id)}}">
                        <i class='bx bx-folder-plus' style="font-size:4rem"></i>
                    </a>
                </div>
                <div class="card-body">
                    <table id="tabla" class="table table-striped">
                        <thead>
                            <th>Diagnostico</th>
                            <th>Fecha</th>
                            <th>Proxima Cita</th>
                            <th>Indicaciones</th>
                            <th>Receta</th>
                        </thead>
                        <tbody>
                            @foreach ($recetas as $item)
                                <td>{{$item->diagnostico}}</td>
                                <td>{{$item->fecha}}</td>
                                <td>{{$item->proxima_cita}}</td>
                                <td></td>
                                <td></td>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

