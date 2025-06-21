<?php

namespace App\Http\Controllers;

use App\Models\Recetas;
use App\Models\Pacientes;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Datetime;
use Carbon\Carbon;

class RecetasController extends Controller
{

    public function index()
    {
        //
    }

    public function create($id)
    {
        $paciente = Pacientes::find($id);
        $f_nacimiento = new DateTime($paciente->fecha_nacimiento);
        $hoy = new DateTime();
        $edad = $hoy->diff($f_nacimiento);
        $edad = $edad->y;
        return view('recetas.create',compact("paciente","id", "edad"));

    }

    public function store(Request $request, $id)
    {
        $hora = Carbon::now()->format('H:i:s');
        $g = new Recetas();
        $g->id_paciente = $id;
        $g->fecha = Carbon::now();
        $g->hora = $hora;
        $g->diagnostico = $request->diagnostico;
        $g->indicaciones = $request->indicaciones;
        $g->proxima_cita = $request->proxima_cita;
        $g->Save();

        return redirect('recetas/'.$id)
        ->with('title','Registro Exitoso')
        ->with('alert','Receta Creada Exitosamente')
        ->with('icon','success');

    }

    public function show(Recetas $recetas, $id)
    {
        $paciente = Pacientes::find($id);
        $recetas = Recetas::where('id_paciente',$id)->get();
        return view('recetas.index', compact("paciente","id","recetas"));
    }

    public function edit(Recetas $recetas,$id)
    {
        $recetas = Recetas::find($id);
        $paciente = Pacientes::find($recetas->id_paciente);
        $f_nacimiento = new DateTime($paciente->fecha_nacimiento);
        $hoy = new DateTime();
        $edad = $hoy->diff($f_nacimiento);
        $edad = $edad->y;
        return view('recetas.editar',compact("recetas",'id','paciente','edad'));
    }

    public function update(Request $request, Recetas $recetas)
    {
        //
    }

    public function destroy(Recetas $recetas)
    {
        //
    }

    public function pdf ($id){

        $receta = Recetas::find($id);
        $paciente = Pacientes::find($receta->id_paciente);
        $f_nacimiento = new DateTime($paciente->fecha_nacimiento);
        $hoy = new DateTime();
        $edad = $hoy->diff($f_nacimiento);
        $edad = $edad->y;
        $pdf = Pdf::loadView('recetas.pdf.receta', compact("receta", "paciente", "edad"));
        return $pdf->stream('invoice.pdf');
    }
}
