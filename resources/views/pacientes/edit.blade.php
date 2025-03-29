@extends('layouts.layout')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Editar Paciente</h2>
                    <div class="container">
                        <form action="{{route('actualizar_paciente',$id)}}" method="post" class="needs-validation" id="formulario" novalidate>
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">No Expediente</label>
                                <input type="text" class="form-control" value="{{$paciente->no_expediente}}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Nombre</label>
                                <input type="text" name="nombre_paciente" class="form-control" value="{{$paciente->nombre}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Apellido Paterno</label>
                                <input type="text" name="apellido_paterno" class="form-control" value="{{$paciente->apellido_paterno}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Apellido Materno</label>
                                <input type="text" name="apellido_materno" class="form-control" value="{{$paciente->apellido_materno}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" name="fecha_nacimiento" class="form-control" value="{{$paciente->fecha_nacimiento}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">CURP</label>
                                <input type="text" name="curp" class="form-control" style="text-transform: uppercase" value="{{$paciente->curp}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Domicilio</label>
                                <input type="text" name="domicilio" class="form-control" value="{{$paciente->domicilio}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Telefono</label>
                                <input type="number" name="telefono_paciente" class="form-control" value="{{$paciente->telefono}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Ocupación</label>
                                <input type="text" name="ocupacion" class="form-control" value="{{$paciente->ocupacion}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Estado Civil</label>
                                <input type="text" name="estado_civil" class="form-control" value="{{$paciente->estado_civil}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Religión</label>
                                <input type="text" name="religion" class="form-control" value="{{$paciente->religion}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Escolaridad</label>
                                <input type="text" name="escolaridad" class="form-control" value="{{$paciente->escolaridad}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Alergias</label>
                                <input type="text" name="alergias" class="form-control" value="{{$paciente->alergias}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Medicamentos</label>
                                <input type="text" name="medicamentos" class="form-control" value="{{$paciente->medicamentos}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Tipo de Sangre</label>
                                <input type="text" name="tipo_sangre" class="form-control" value="{{$paciente->tipo_sangre}}" required>
                            </div>
                            <h4>Contacto de Emergencia</h4>
                            <div class="mb-3">
                                <label for="" class="form-label">Nombre Completo</label>
                                <input type="text" name="contacto_nombre" class="form-control" value="{{$paciente->contacto_nombre}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Número de Telefono</label>
                                <input type="number" name="contacto_telefono" class="form-control" value="{{$paciente->contacto_telefono}}" required>
                            </div>
                            <div class="mb-3">
                                <input type="radio" name="activo" class="form-check-input" value="1" {{$paciente->activo == 1 ? "checked" : ""}}>
                                <label class="form-check-label" for="flexRadioDefault2">Activo </label>
                                <input type="radio" name="activo" class="form-check-input" value="0" {{$paciente->activo == 0 ? "checked" : ""}}>
                                <label class="form-check-label" for="flexRadioDefault2">Inactivo </label>
                            </div>
                            <button type="submit" class="btn boton_estilo">Guardar</button>
                        </form>
                    </div>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function(e) {
        var form = document.querySelector('#formulario');
        var submitButton = document.querySelector('#boton_siguiente');
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                Swal.fire({
                  title: "Datos Inconclusos",
                  text: "Asegurate de que todos los datos esten llenos",
                  icon: "error",
                  confirmButtonColor: "#3dd9bc",
                });
            } else {
                submitButton.setAttribute('disabled', true);
                Swal.fire({
                    title: 'Guardando Datos',
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    didOpen: () => {
                    Swal.showLoading()
                    },
                });
            }
            form.classList.add('was-validated');
        });
    });
</script>
@endsection

