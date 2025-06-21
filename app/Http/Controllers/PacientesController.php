<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;
use Illuminate\Http\Request;

class PacientesController extends Controller
{

    public function index()
    {
        $pacientes = Pacientes::all();
        return view('pacientes.index',compact("pacientes"));
    }

    public function create()
    {
        return view('pacientes.create');
    }

    public function store(Request $request)
    {
        $num = Pacientes::count();

        if ($num == 0) {
            $expediente = "FD-00001";
        } else {
            $clave = Pacientes::where('activo',1)->orderBy('no_expediente','desc')->first();
            $clave = $clave->no_expediente;
            $exp = explode('-', $clave);
            $numExp = intval($exp[1]) + 1;
            $caracteres= strlen($numExp);
            switch ($caracteres) {
                case '1':
                    $expediente = "FD-0000".$numExp;
                    break;
                case '2':
                    $expediente = "FD-000".$numExp;
                    break;
                case '3':
                    $expediente = "FD-00".$numExp;
                    break;
                case '4':
                    $expediente = "FD-0".$numExp;
                    break;

                default:
                    $expediente = "FD-".$numExp;
                    break;
            }
        }

        try {
            $g= new Pacientes();
            $g->no_expediente = $expediente;
            $g->nombre=$request->nombre_paciente;
            $g->apellido_paterno=$request->apellido_paterno;
            $g->apellido_materno=$request->apellido_materno;
            $g->sexo=$request->sexo;
            $g->fecha_nacimiento=$request->fecha_nacimiento;
            $g->curp=$request->curp;
            $g->domicilio=$request->domicilio;
            $g->telefono=$request->telefono_paciente;
            $g->ocupacion=$request->ocupacion;
            $g->estado_civil=$request->estado_civil;
            $g->religion=$request->religion;
            $g->escolaridad=$request->escolaridad;
            $g->alergias=$request->alergias;
            $g->medicamentos=$request->medicamentos;
            $g->contacto_telefono=$request->contacto_telefono;
            $g->contacto_nombre=$request->contacto_nombre;
            $g->tipo_sangre=$request->tipo_sangre;
            $g->Save();

            return redirect()->route('pacientes')
            ->with('title','Registro Exitoso')
            ->with('alert','Paciente Registrado Exitosamente')
            ->with('icon','success');

        } catch (\Throwable $th) {
            return redirect()->route('pacientes')
            ->with('title','Registro Fallido')
            ->with('alert','El paciente no se guardo correctamente, reintente de nuevo.')
            ->with('icon','error');
        }

    }

    public function show(Pacientes $pacientes)
    {
        //
    }

    public function edit(Pacientes $pacientes, $id)
    {
        $paciente = Pacientes::find($id);
        return view('pacientes.edit',compact('paciente','id'));
    }

    public function update(Request $request, Pacientes $pacientes, $id)
    {
        try {
            $g=Pacientes::find($id);
            $g->nombre=$request->nombre_paciente;
            $g->apellido_paterno=$request->apellido_paterno;
            $g->apellido_materno=$request->apellido_materno;
            $g->fecha_nacimiento=$request->fecha_nacimiento;
            $g->sexo=$request->sexo;
            $g->curp=$request->curp;
            $g->domicilio=$request->domicilio;
            $g->telefono=$request->telefono_paciente;
            $g->ocupacion=$request->ocupacion;
            $g->estado_civil=$request->estado_civil;
            $g->religion=$request->religion;
            $g->escolaridad=$request->escolaridad;
            $g->alergias=$request->alergias;
            $g->medicamentos=$request->medicamentos;
            $g->contacto_telefono=$request->contacto_telefono;
            $g->contacto_nombre=$request->contacto_nombre;
            $g->tipo_sangre=$request->tipo_sangre;
            $g->activo = $request->activo;
            $g->Save();
            return redirect()->route('pacientes')
            ->with('title','Registro Actualizado')
            ->with('alert','Paciente Actualizado Correctamente')
            ->with('icon','success');
        } catch (\Throwable $th) {
            return redirect()->route('pacientes')
            ->with('title','Actualización Fallida')
            ->with('alert','El registro fallo en actualizar, reintente de nuevo')
            ->with('icon','error');
        }

    }

    public function destroy(Pacientes $pacientes)
    {
        //
    }
}
