@extends('layouts.layout')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Nueva Receta</h2>
                    <h5>Paciente: {{$paciente->nombre .' '. $paciente->apellido_paterno .' '. $paciente->apellido_materno}}</h5>
                </div>
                <div class="card-body">
                    <div class="container">
                        <form action="{{route('guardar_paciente')}}" method="post" class="needs-validation" id="formulario" novalidate>
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Fecha</label>
                                <input type="text" name="" class="form-control" value="{{\Carbon\Carbon::now()->format('d-m-Y')}}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Edad</label>
                                <input type="text" name="diagnostico" class="form-control" value="" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Diagnóstico</label>
                                <input type="text" name="diagnostico" class="form-control" value="" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Indicaciones</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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

