<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    html{
        font-size: 0.8rem
    }
    @page{
        margin: 10px;
    }
    .titulo{
    text-align: center;
    font-weight:bold;
    font-size: 30px;
    color: #3d7dd9;
    }
</style>
<body>
    <div style="border-left: #3d7dd9 solid 10px">
    <table style="width: 100%">
        <tr>
            <td style="width: 33%; text-align: center">
        <img src="{{ public_path('imagenes/logo.jpg') }}" style="width: 150px;" alt="Logo">
            </td>
            <td style="width: 34%;">
                <span class="titulo">FISIODERMA</span>
            </td>
            <td style="width: 33%">
                <table style="float: right; padding-top: 45px">
                    <tr>
                        <td>FECHA: </td>
                        <td style="border-bottom: 1px solid black; width:130px ; font-weight: bold; text-align:center">{{date("d-m-Y")}}</td>
                    </tr>
                    <tr>
                        <td>N° DE EXPEDIENTE: </td>
                        <td style="border-bottom: 1px solid black; width:130px; font-weight: bold; text-align:center">{{$paciente->no_expediente}}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br>
    <table style="width: 100%">
        <tr>
            <td>NOMBRE: </td>
            <td style="width: 45%; border-bottom: 1px solid black; font-weight: bold; text-align:center">{{$paciente->nombre .' '. $paciente->apellido_paterno .' '. $paciente->apellido_materno}}</td>
            <td>EDAD: </td>
            <td style="width: 15%; border-bottom: 1px solid black; font-weight: bold; text-align:center">{{$edad}}</td>
            <td>SEXO: </td>
            <td style="width: 15%; border-bottom: 1px solid black; font-weight: bold; text-align:center">{{$paciente->sexo == 0 ? "Femenino" : "Masculino"}}</td>
        </tr>
    </table>
    <br>
    <table style="width: 100%">
        <tr>
            <td style="width: 35%">DIAGNÓSTICO FISIOTERAPEUTICO</td>
            <td style="border-bottom: 1px solid black; width: 70%; font-weight: bold; text-align:center">{{$receta->diagnostico}}</td>
        </tr>
    </table>
    <br>
    <h3 style="text-align: center">INDICACIONES</h3>
 <div style="width: 100%; min-height: 15%; padding-left:50px; padding-right:50px; font-size:14px">
        {!! $receta->indicaciones !!}
 </div>
 <div style="float: right; width:100vh">
    <table style="width: 240px">
        <tr>
            <td style="border-bottom: 1px solid black; text-align:center; font-weight: bold">{{auth()->user()->name}}</td>

        </tr>
        <tr>
            <td style="text-align: center; font-size: 12px">NOMBRE Y FIRMA DEL FISIOTERAPEUTA</td>
        </tr>
    </table>
 </div>
  <div style="float: left; width:100vh">
    <table style="width: 240px">
        <tr>
            <td style="border-bottom: 1px solid black; text-align:center; font-weight: bold">{{\Carbon\Carbon::parse($receta->proxima_cita)->format('d-m-Y')}}</td>

        </tr>
        <tr>
            <td style="text-align: center; font-size: 12px">PRÓXIMA CITA</td>
        </tr>
    </table>
 </div>
 <br><br><br>
 <hr style=" width: 100%; height: 2px; background-color: #3dd9bc; border:#3dd9bc 1px solid; margin-top: 0; margin-bottom: 0">
 <div style="width: 100%; background-color: #3d7dd9;">
    <p style="color: white; font-size:10px; text-align:center;">Plaza Prisma: Consultorio 10. Prol 5 de mayo 742, Col. Comisión Federal de Electricidad, Del. San Sebastián, Toluca de Lerdo, Estado de México, Estado de Mécido. C.P: 50150</p>
    <p style="color: white; font-size:10px; text-align:center; line-height: 5px">Tel: 722 516 5535   Correo Electrónico: fisiodermatoluca@gmail.com</p>
 </div>
 </div>
</body>
</html>
