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
                            <th>Diagnóstico</th>
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
                                        <i class="bi bi-file-earmark-pdf-fill text-danger" style="font-size:2.5rem"></i>
                                    </a>
                                    <!-- Button trigger modal -->
                                    <a href="{{url('enviar_receta',$item->id_receta)}}" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="bi bi-envelope-at-fill text-primary" style="font-size:2.5rem"></i>
                                    </a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Enviar por correo electrónico</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{url('enviar_receta',$item->id_receta)}}" method="post">
                                            @csrf
                                        <div class="modal-body">
                                                <div class=" row">
                                                    <label for="" class="col-sm-4 col-form-label">Correo Electrónico</label>
                                                    <div class="col-sm-8">
                                                        <input type="email" class="form-control" id="" name="email" value="{{$paciente->correo}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Enviar</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                    </div>

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

