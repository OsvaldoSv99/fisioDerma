@extends('layouts.layout')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Nuevo Paciente</h2>
                </div>
                <div class="card-body">
                    <div class="container">
                        <form action="{{route('guardar_paciente')}}" method="post" class="needs-validation" id="formulario" novalidate>
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Nombre</label>
                                <input type="text" name="nombre_paciente" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Apellido Paterno</label>
                                <input type="text" name="apellido_paterno" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Apellido Materno</label>
                                <input type="text" name="apellido_materno" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Sexo</label><br>
                                <input type="radio" required name="sexo" id="" value="0" class="form-check-input" checked> Femenino
                                <input type="radio" required name="sexo" id="" value="1" class="form-check-input"> Masculino
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" name="fecha_nacimiento" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">CURP</label>
                                <input type="text" name="curp" class="form-control" style="text-transform: uppercase" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Domicilio</label>
                                <input type="text" name="domicilio" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Telefono</label>
                                <input type="number" name="telefono_paciente" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Ocupación</label>
                                <input type="text" name="ocupacion" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Estado Civil</label>
                                <input type="text" name="estado_civil" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Religión</label>
                                <input type="text" name="religion" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Escolaridad</label>
                                <input type="text" name="escolaridad" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Alergias</label>
                                <input type="text" name="alergias" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Medicamentos</label>
                                <input type="text" name="medicamentos" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Tipo de Sangre</label>
                                <input type="text" name="tipo_sangre" class="form-control" required>
                            </div>
                            <h4>Contacto de Emergencia</h4>
                            <div class="mb-3">
                                <label for="" class="form-label">Nombre Completo</label>
                                <input type="text" name="contacto_nombre" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Número de Telefono</label>
                                <input type="number" name="contacto_telefono" class="form-control" required>
                            </div>
                            <button type="submit" class="btn boton_estilo">Guardar</button>
                        </form>
                    </div>
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

