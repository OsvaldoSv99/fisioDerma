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
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Diagnostico</th>
                            <th>Proxima Cita</th>
                            <th>Indicaciones</th>
                            <th>Receta</th>
                        </thead>
                        <tbody>
                            @foreach ($recetas as $item)
                            <tr>
                                <td>{{Carbon\Carbon::parse($item->fecha)->format('d-m-Y')}} </td>
                                <td>{{date("h:i A", strtotime($item->hora))}}</td>
                                <td>{{$item->diagnostico}}</td>
                                <td>{{Carbon\Carbon::parse($item->proxima_cita)->format('d-m-Y')}}</td>
                                <td>{!! $item->indicaciones !!}</td>
                                <td>
                                    <a href="{{url('pdf_receta',$item->id_receta)}}" target="_blank">
                                        <i class='bx bxs-file-pdf text-danger' style="font-size:3rem"></i>
                                    </a>
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

